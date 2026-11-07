(function () {
  let e = document.createElement(`link`).relList;
  if (e && e.supports && e.supports(`modulepreload`)) return;
  for (let e of document.querySelectorAll(`link[rel="modulepreload"]`)) n(e);
  new MutationObserver((e) => {
    for (let t of e)
      if (t.type === `childList`)
        for (let e of t.addedNodes)
          e.tagName === `LINK` && e.rel === `modulepreload` && n(e);
  }).observe(document, { childList: !0, subtree: !0 });
  function t(e) {
    let t = {};
    return (
      e.integrity && (t.integrity = e.integrity),
      e.referrerPolicy && (t.referrerPolicy = e.referrerPolicy),
      (t.credentials =
        e.crossOrigin === `use-credentials`
          ? `include`
          : e.crossOrigin === `anonymous`
            ? `omit`
            : `same-origin`),
      t
    );
  }
  function n(e) {
    if (e.ep) return;
    e.ep = !0;
    let n = t(e);
    fetch(e.href, n);
  }
})();
function e() {
  let e = document.getElementById(`callback-modal`);
  if (!e) return;
  let t = document.querySelectorAll(`[data-modal-open="callback"]`),
    n = e.querySelectorAll(`[data-modal-close]`),
    r = e.querySelector(`#callback-form`);
  function i() {
    (e.classList.add(`modal--open`),
      e.setAttribute(`aria-hidden`, `false`),
      (document.body.style.overflow = `hidden`));
  }
  function a() {
    (e.classList.remove(`modal--open`),
      e.setAttribute(`aria-hidden`, `true`),
      (document.body.style.overflow = ``));
  }
  (t.forEach((e) => {
    e.addEventListener(`click`, (e) => {
      (e.preventDefault(), i());
    });
  }),
    n.forEach((e) => {
      e.addEventListener(`click`, a);
    }),
    document.addEventListener(`keydown`, (t) => {
      t.key === `Escape` && e.classList.contains(`modal--open`) && a();
    }),
    r &&
      r.addEventListener(`submit`, async (e) => {
        e.preventDefault();
        let t = new FormData(r),
          n = Object.fromEntries(t);
        if (!n.agreement) {
          alert(`Подтвердите согласие на обработку персональных данных`);
          return;
        }
        if (!n.phone || n.phone.trim().length < 6) {
          alert(`Введите корректный номер телефона`);
          return;
        }
        (console.log(`Отправка формы:`, n),
          alert(`Заявка отправлена! Мы свяжемся с вами.`),
          r.reset(),
          a());
      }));
}
/**function t() {
  let e = document.getElementById(`calc-form`);
  if (!e) return;
  let t = e.querySelector(`#calc-brand`),
    n = e.querySelector(`#calc-service`),
    r = e.querySelector(`#calc-result`),
    i = e.querySelector(`.calc__submit`),
    a = {
      to: {
        toyota: [5e3, 8e3],
        honda: [5e3, 8e3],
        nissan: [5e3, 8e3],
        mazda: [5e3, 8e3],
        mitsubishi: [5e3, 8e3],
        subaru: [5500, 8500],
        suzuki: [4500, 7e3],
        lexus: [9e3, 14e3],
        infiniti: [9e3, 14e3],
        acura: [8500, 13e3],
      },
      electrical: {
        toyota: [3e3, 6e3],
        honda: [3e3, 6e3],
        nissan: [3e3, 6e3],
        mazda: [3e3, 6e3],
        mitsubishi: [3e3, 6e3],
        subaru: [3500, 6500],
        suzuki: [2800, 5500],
        lexus: [6e3, 11e3],
        infiniti: [6e3, 11e3],
        acura: [5500, 1e4],
      },
      transmission: {
        toyota: [3e4, 5e4],
        honda: [3e4, 5e4],
        nissan: [3e4, 5e4],
        mazda: [28e3, 48e3],
        mitsubishi: [28e3, 48e3],
        subaru: [35e3, 55e3],
        suzuki: [25e3, 45e3],
        lexus: [6e4, 9e4],
        infiniti: [6e4, 9e4],
        acura: [55e3, 85e3],
      },
      diagnostics: {
        toyota: [1500, 2500],
        honda: [1500, 2500],
        nissan: [1500, 2500],
        mazda: [1500, 2500],
        mitsubishi: [1500, 2500],
        subaru: [1800, 2800],
        suzuki: [1200, 2e3],
        lexus: [2500, 3500],
        infiniti: [2500, 3500],
        acura: [2200, 3200],
      },
      cooling: {
        toyota: [4e3, 7e3],
        honda: [4e3, 7e3],
        nissan: [4e3, 7e3],
        mazda: [4e3, 7e3],
        mitsubishi: [4e3, 7e3],
        subaru: [4500, 7500],
        suzuki: [3500, 6e3],
        lexus: [7e3, 12e3],
        infiniti: [7e3, 12e3],
        acura: [6500, 11e3],
      },
    };
  function o(e) {
    return e.toLocaleString(`ru-RU`) + ` ₽`;
  }
  function s() {
    let s = t.value,
      c = n.value,
      l = e.querySelector(`input[name="urgency"]:checked`).value;
    if (!s || !c) {
      ((r.textContent = `—`), (i.disabled = !0));
      return;
    }
    let [u, d] = a[c][s],
      f = l === `urgent` ? 1.3 : 1,
      p = Math.round(u * f),
      m = Math.round(d * f);
    ((r.textContent = `${o(p)} — ${o(m)}`), (i.disabled = !1));
  }
  (e.addEventListener(`change`, s),
    e.addEventListener(`submit`, (t) => {
      t.preventDefault();
      let n = Object.fromEntries(new FormData(e));
      if (!n.agreement) {
        alert(`Подтвердите согласие на обработку персональных данных`);
        return;
      }
      let r = document.getElementById(`callback-modal`);
      (r &&
        (r.classList.add(`modal--open`),
        r.setAttribute(`aria-hidden`, `false`),
        (document.body.style.overflow = `hidden`)),
        console.log(`Заявка:`, n));
    }));
}  */
function n() {
  let e = document.querySelector(`.burger`),
    t = document.getElementById(`offcanvas`),
    n = document.getElementById(`offcanvas-overlay`),
    r = document.querySelector(`.offcanvas__close`);
  if (!e || !t) return;
  function i() {
    (t.classList.add(`open`),
      n.classList.add(`open`),
      e.classList.add(`open`),
      document.body.classList.add(`menu-open`));
  }
  function a() {
    (t.classList.remove(`open`),
      n.classList.remove(`open`),
      e.classList.remove(`open`),
      document.body.classList.remove(`menu-open`));
  }
  (e.addEventListener(`click`, i),
    r.addEventListener(`click`, a),
    n.addEventListener(`click`, a));
}
function r() {
  let e = document.getElementById(`service-form`);
  e &&
    e.addEventListener(`submit`, (t) => {
      t.preventDefault();
      let n = Object.fromEntries(new FormData(e));
      if (!n.agreement) {
        alert(`Подтвердите согласие на обработку персональных данных`);
        return;
      }
      if (!n.phone || n.phone.trim().length < 6) {
        alert(`Введите корректный номер телефона`);
        return;
      }
      (console.log(`Заявка:`, n),
        alert(`Заявка отправлена! Мы свяжемся с вами.`),
        e.reset());
    });
}
document.addEventListener(`DOMContentLoaded`, () => {
  (e(), n(), r());
});
