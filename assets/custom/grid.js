$(function() {
  $.ajax({
    type: "GET",
    url: "getAllSppd/"
  }).done(function(countries) {
    countries.unshift({ id: "0", name: "" });

    $(".jsGrid").jsGrid({
      height: "500px",
      width: "100%",
      filtering: true,
      inserting: true,
      editing: true,
      sorting: true,
      paging: true,
      autoload: true,
      pageSize: 10,
      pageButtonCount: 5,
      deleteConfirm: "Do you really want to delete client?",
      controller: {
        loadData: function(filter) {
          return $.ajax({
            type: "GET",
            url: "getAllSppd/",
            data: filter
          });
        },
        insertItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "addSppd/",
            data: item
          });
        },
        updateItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "updateSppd/",
            data: item
          });
        },
        deleteItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "deleteSppd/",
            data: item
          });
        }
      },
      fields: [
        {
          name: "nama",
          title: "Nama Pegawai",
          type: "text",
          width: 50
        },
        {
          name: "pangkat",
          title: "Pangkat / Gol. Ruang",
          type: "text",
          width: 50
        },
        {
          name: "jabatan",
          title: "jabatan",
          type: "text",
          width: 50
        },
        {
          name: "maksud",
          title: "Maksud Perj. Dinas",
          type: "text",
          width: 50
        },
        {
          name: "tmp_berangkat",
          title: "Tempat Berangkat",
          type: "text",
          width: 50
        },
        {
          name: "tmp_tujuan",
          title: "Tempat Tujuan",
          type: "text",
          width: 50
        },
        {
          name: "tgl_berangkat",
          title: "Tanggal Berangkat",
          type: "text",
          width: 50
        },
        {
          name: "tgl_kembali",
          title: "Tanggal Kembali",
          type: "text",
          width: 50
        },
        {
          name: "instansi",
          title: "Instansi",
          type: "text",
          width: 50
        },
        {
          name: "rekening",
          title: "Kode Rekening",
          type: "text",
          width: 50
        },
        { type: "control" }
      ]
    });
  });
});