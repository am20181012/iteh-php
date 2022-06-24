//DODAVANJE transakcije - CREATE
$("#addTransaction").submit(function () {
  event.preventDefault();

  console.log("Dodavanje transakcije");
  const $form = $(this);
  const $input = $form.find("input, select, button, textarea");

  const serijalizacija = $form.serialize();
  console.log(serijalizacija);

  $input.prop("disabled", true);

  req = $.ajax({
    url: "../handler/add.php",
    type: "post",
    data: serijalizacija,
  });

  req.done(function (res, textStatus, jqXHR) {
    if (res == "Success") {
      alert("Uspesno dodata transakcija!");
      console.log("Dodata transakcija");
      location.reload(true);
    } else console.log("Transakcija nije dodata: " + res);
    console.log(res);
  });

  req.fail(function (jqXHR, textStatus, errorThrown) {
    console.error("Sledeca greska se desila> " + textStatus, errorThrown);
  });
});
