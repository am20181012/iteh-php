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

//CITANJE JEDNE TRANSAKCIJE - READ by id
function editTransaction(id) {
  console.log("Izmena");

  request = $.ajax({
    url: "../handler/get.php",
    type: "post",
    data: { edit_id: id },
    dataType: "json",
  });

  request.done(function (response, textStatus, jqXHR) {
    console.log("Popunjena");
    $("#title").val(response[0]["transaction_name"]);
    console.log(response[0]["transaction_name"]);

    $("#money").val(response[0]["money"].trim());
    console.log(response[0]["money"].trim());

    $("#date").val(response[0]["date"].trim());
    console.log(response[0]["date"].trim());

    $("#description").val(response[0]["description"].trim());
    console.log(response[0]["description"].trim());

    $("#category").val(response[0]["category_id"].trim());
    console.log(response[0]["category_id"].trim());

    $("#id").val(id);

    console.log(response);
  });

  request.fail(function (jqXHR, textStatus, errorThrown) {
    console.error("The following error occurred: " + textStatus, errorThrown);
  });
}
