$(document).ready(function () {
  viewMahasiswa();
  $(".btntambah-mahasiswa").click(function (e) {
    e.preventDefault();
    const animation = $(this).data("animation");
    $.ajax({
      url: "/Mahasiswa/TambahMahasiswa",
      dataType: "JSON",
      success: function (response) {
        $(".view-modal").html(response.data).show();
        $("#modal-tambah").modal("show");
        $(".modal .modal-dialog").attr(
          "class",
          "modal-dialog " + "animated " + animation
        );
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
      },
    });
  });
});

function viewMahasiswa() {
  $.ajax({
    url: "/Mahasiswa/GetMahasiswa",
    dataType: "JSON",
    success: function (response) {
      $("#get-mahasiswa").html(response.data);
    },
    error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
    },
  });
}
