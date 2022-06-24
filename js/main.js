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

//BRISANJE transakcije - DELETE
function deleteTransaction(id) {
  console.log("Brisanje");

  if (confirm("Da li ste sigurni da zelite da obrisete ovu transakciju?")) {
    req = $.ajax({
      url: "../handler/delete.php",
      type: "post",
      data: { deleted_id: id },
    });

    req.done(function (res, textStatus, jqXHR) {
      if (res == "Success") {
        $("#card" + id).hide("slow");
        $("#main-card" + id).hide("slow");
        console.log($("#card" + id));
        //alert("Obrisana transakcija.");
        console.log("obrisana");
      } else {
        console.log("transakcija nije obrisana " + res);
        alert("Transakcija nije obrisana!");
      }
      console.log(res);
    });
  }
}
