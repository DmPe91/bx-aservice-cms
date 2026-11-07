document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("feedback-form");
  if (!form) return;

  const serviceSelect = form.querySelector("#fb-service");
  const brandSelect = form.querySelector("#fb-brand");
  const hiddenService = form.querySelector("#fb-service-hidden");
  const hiddenBrand = form.querySelector("#fb-brand-hidden");
  const submitBtn = form.querySelector(".service-detail__submit");
  const messageEl = form.querySelector("#feedback-message");
  const agreement = form.querySelector(
    'input[name="form_checkbox_AGREEMENT[]"]',
  );

  const ajaxUrl =
    (window.AUTOSERVICE_FEEDBACK && window.AUTOSERVICE_FEEDBACK.ajaxUrl) ||
    "/local/components/autoservice/feedback.form/ajax.php";

  // При изменении select — пишем название в hidden
  function syncSelect(select, hidden) {
    if (!select || !hidden) return;
    select.addEventListener("change", () => {
      const opt = select.options[select.selectedIndex];
      hidden.value = opt ? opt.text : "";
    });
  }
  syncSelect(serviceSelect, hiddenService);
  syncSelect(brandSelect, hiddenBrand);

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

    fetch(ajaxUrl, { method: "POST", body: formData })
      .then((r) => r.json())
      .then((data) => {
        if (data.success) {
          messageEl.textContent = "Спасибо! Заявка отправлена.";
          messageEl.style.display = "block";
          form.reset();
          if (hiddenService)
            hiddenService.value = hiddenService.dataset.default || "";
          if (hiddenBrand)
            hiddenBrand.value = hiddenBrand.dataset.default || "";
          submitBtn.textContent = "Отправить заявку";
          submitBtn.disabled = false;
        } else {
          messageEl.textContent =
            "Ошибка: " + (data.error || "Не удалось отправить");
          messageEl.style.display = "block";
          submitBtn.disabled = false;
          submitBtn.textContent = "Отправить заявку";
        }
      })
      .catch((err) => {
        console.error("[FEEDBACK] fetch error:", err);
        alert("Ошибка сети. Попробуйте ещё раз.");
        submitBtn.disabled = false;
        submitBtn.textContent = "Отправить заявку";
      });
  });
});
