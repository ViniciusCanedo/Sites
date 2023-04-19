const mask = {
  celular(value) {
    return value
      .replace(/\D/g, "")
      .replace(/(\d{2})(\d)/, "($1) $2")
      .replace(/(\d{4})(\d)/, "$1-$2")
      .replace(/(\d{4})-(\d)(\d{4})/, "$1$2-$3");
  },

  noNumber(value) {
    return value.replace(/\d/g, "");
  },

  justNumber(value) {
    return value.replace(/\D/g, "");
  },
};

document.querySelectorAll("input").forEach(($input) => {
  const field = $input.dataset.js;

  $input.addEventListener(
    "input",
    (e) => {
      e.target.value = mask[field](e.target.value);
    },
    false
  );
});
