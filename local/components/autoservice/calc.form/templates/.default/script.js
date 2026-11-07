document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("calc-form");
  if (!form) return;

  const brandSelect = form.querySelector("#calc-brand");
  const serviceSelect = form.querySelector("#calc-service");
  const urgencyRadios = form.querySelectorAll('input[name="urgency"]');
  const resultEl = form.querySelector("#calc-result");
  const submitBtn = form.querySelector(".calc__submit");
  const agreement = form.querySelector(
    'input[name="form_checkbox_AGREEMENT[]"]',
  );
  const messageEl = form.querySelector("#calc-message");

  const hiddenBrand = form.querySelector("#calc-brand-hidden");
  const hiddenService = form.querySelector("#calc-service-hidden");
  const hiddenUrgency = form.querySelector("#calc-urgency-hidden");
  const hiddenPrice = form.querySelector("#calc-price-hidden");

  const urgentRate =
    (window.AUTOSERVICE_CALC && window.AUTOSERVICE_CALC.urgentRate) || 1.3;
  const ajaxUrl =
    (window.AUTOSERVICE_CALC && window.AUTOSERVICE_CALC.ajaxUrl) ||
    "/local/components/autoservice/calc.form/ajax.php";

  function calc() {
    const selected = serviceSelect.options[serviceSelect.selectedIndex];
    const price = parseFloat(selected?.dataset?.price || "0");
    const isUrgent =
      form.querySelector('input[name="urgency"]:checked')?.value === "urgent";

    let total = 0;
    if (price > 0) {
      total = isUrgent ? price * urgentRate : price;
      resultEl.textContent =
        "от " + Math.round(total).toLocaleString("ru-RU") + " ₽";
    } else {
      resultEl.textContent = "—";
    }

    if (hiddenBrand)
      hiddenBrand.value =
        brandSelect.options[brandSelect.selectedIndex]?.text || "";
    if (hiddenService) hiddenService.value = selected?.text || "";
    if (hiddenUrgency) hiddenUrgency.value = isUrgent ? "Срочная" : "Обычная";
    if (hiddenPrice) hiddenPrice.value = total ? Math.round(total) : "";

    submitBtn.disabled = !(brandSelect.value && serviceSelect.value);
  }

  serviceSelect.addEventListener("change", calc);
  brandSelect.addEventListener("change", calc);
  urgencyRadios.forEach((r) => r.addEventListener("change", calc));
  calc();

  form.addEventListener("submit", function (e) {
    e.preventDefault();
    e.stopPropagation();

    if (!agreement || !agreement.checked) {
      alert("Подтвердите согласие на обработку персональных данных");
      return;
    }

    submitBtn.disabled = true;
    submitBtn.textContent = "Отправка...";
    if (messageEl) messageEl.style.display = "none";

    const formData = new FormData(form);

    fetch(ajaxUrl, {
      method: "POST",
      body: formData,
    })
      .then((r) => r.json())
      .then((data) => {
        if (data.success) {
          messageEl.textContent =
            "Спасибо! Заявка отправлена. Мы свяжемся с вами.";
          messageEl.style.display = "block";
          form.reset();
          resultEl.textContent = "—";
          submitBtn.textContent = "Узнать точную стоимость";
          submitBtn.disabled = true;
          [hiddenBrand, hiddenService, hiddenUrgency, hiddenPrice].forEach(
            (h) => {
              if (h) h.value = "";
            },
          );
        } else {
          messageEl.textContent =
            "Ошибка: " + (data.error || "Не удалось отправить");
          messageEl.style.display = "block";
          submitBtn.disabled = false;
          submitBtn.textContent = "Узнать точную стоимость";
        }
      })
      .catch((err) => {
        console.error("[CALC] fetch error:", err);
        alert("Ошибка сети. Попробуйте ещё раз.");
        submitBtn.disabled = false;
        submitBtn.textContent = "Узнать точную стоимость";
      });
  });
});
