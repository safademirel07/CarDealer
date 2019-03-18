
$(document).ready(function () {
  $('#commentForm').on('submit', function (e) {
    var data = $("#commentForm").serialize();
    console.log("test");
    $.ajax({
      type: 'post',
      url: "inc/post/comment.php",
      data: data,
      success: function (cevap) {
        $("#sonuc").html("" + cevap);
      }
    });
    e.preventDefault();
  });


  $('#changeTypeForm').on('submit', function (e) {
    $('#change-modal').modal('toggle');

    var data = $("#changeTypeForm").serialize();
    console.log(data);
    $.ajax({
      type: 'post',
      url: "inc/post/type/changetype.php",
      data: data,
      success: function (cevap) {
        $("#sonuc").html("" + cevap);
      }
    });
    e.preventDefault();
  });


  $('#addTypeForm').on('submit', function (e) {
    var data = $("#addTypeForm").serialize();
    console.log(data);
    $.ajax({
      type: 'post',
      url: "inc/post/type/addtype.php",
      data: data,
      success: function (cevap) {
        $("#sonuc").html("" + cevap);
      }
    });
    e.preventDefault();
  });

  $('#changeOptionForm').on('submit', function (e) {
    $('#change-modal').modal('toggle');

    var data = $("#changeOptionForm").serialize();
    console.log(data);
    $.ajax({
      type: 'post',
      url: "inc/post/option/changeoption.php",
      data: data,
      success: function (cevap) {
        $("#sonuc").html("" + cevap);
      }
    });
    e.preventDefault();
  });


  $('#addOptionForm').on('submit', function (e) {
    var data = $("#addOptionForm").serialize();
    console.log(data);
    $.ajax({
      type: 'post',
      url: "inc/post/option/addoption.php",
      data: data,
      success: function (cevap) {
        $("#sonuc").html("" + cevap);
      }
    });
    e.preventDefault();
  });



  $('#changeBrandForm').on('submit', function (e) {
    $('#change-modal').modal('toggle');

    var data = $("#changeBrandForm").serialize();
    console.log(data);
    $.ajax({
      type: 'post',
      url: "inc/post/brand/changebrand.php",
      data: data,
      success: function (cevap) {
        $("#sonuc").html("" + cevap);
      }
    });
    e.preventDefault();
  });


  $('#addBrandForm').on('submit', function (e) {
    var data = $("#addBrandForm").serialize();
    console.log(data);
    $.ajax({
      type: 'post',
      url: "inc/post/brand/addbrand.php",
      data: data,
      success: function (cevap) {
        $("#sonuc").html("" + cevap);
      }
    });
    e.preventDefault();
  });



  $('#changeColorForm').on('submit', function (e) {
    $('#change-modal').modal('toggle');

    var data = $("#changeColorForm").serialize();
    console.log(data);
    $.ajax({
      type: 'post',
      url: "inc/post/color/changecolor.php",
      data: data,
      success: function (cevap) {
        $("#sonuc").html("" + cevap);
      }
    });
    e.preventDefault();
  });


  $('#addColorForm').on('submit', function (e) {
    var data = $("#addColorForm").serialize();
    console.log(data);
    $.ajax({
      type: 'post',
      url: "inc/post/color/addcolor.php",
      data: data,
      success: function (cevap) {
        $("#sonuc").html("" + cevap);
      }
    });
    e.preventDefault();
  });

  $('#changeFuelForm').on('submit', function (e) {
    $('#change-modal').modal('toggle');

    var data = $("#changeFuelForm").serialize();
    console.log(data);
    $.ajax({
      type: 'post',
      url: "inc/post/fuel/changefuel.php",
      data: data,
      success: function (cevap) {
        $("#sonuc").html("" + cevap);
      }
    });
    e.preventDefault();
  });


  $('#addFuelForm').on('submit', function (e) {
    var data = $("#addFuelForm").serialize();
    console.log(data);
    $.ajax({
      type: 'post',
      url: "inc/post/fuel/addfuel.php",
      data: data,
      success: function (cevap) {
        $("#sonuc").html("" + cevap);
      }
    });
    e.preventDefault();
  });

  $('#changeGearForm').on('submit', function (e) {
    $('#change-modal').modal('toggle');

    var data = $("#changeGearForm").serialize();
    console.log(data);
    $.ajax({
      type: 'post',
      url: "inc/post/gear/changegear.php",
      data: data,
      success: function (cevap) {
        $("#sonuc").html("" + cevap);
      }
    });
    e.preventDefault();
  });


  $('#addGearForm').on('submit', function (e) {
    var data = $("#addGearForm").serialize();
    console.log(data);
    $.ajax({
      type: 'post',
      url: "inc/post/gear/addgear.php",
      data: data,
      success: function (cevap) {
        $("#sonuc").html("" + cevap);
      }
    });
    e.preventDefault();
  });

  $('#changeCarOption').on('submit', function (e) {
    $('#change-modal').modal('toggle');

    var data = $("#changeCarOption").serialize();
    console.log(data);
    $.ajax({
      type: 'post',
      url: "inc/post/changecaroption.php",
      data: data,
      success: function (cevap) {
        $("#sonuc").html("" + cevap);
      }
    });
    e.preventDefault();
  });


  $('#addCarOption').on('submit', function (e) {
    var data = $("#addCarOption").serialize();
    console.log(data);
    $.ajax({
      type: 'post',
      url: "inc/post/addcaroption.php",
      data: data,
      success: function (cevap) {
        console.log(cevap);
        $("#sonuc").html("" + cevap);
      }
    });
    e.preventDefault();
  });

  $('#changeModelForm').on('submit', function (e) {
    $('#change-modal').modal('toggle');

    var data = $("#changeModelForm").serialize();
    console.log(data);
    $.ajax({
      type: 'post',
      url: "inc/post/model/changemodel.php",
      data: data,
      success: function (cevap) {
        $("#sonuc").html("" + cevap);
      }
    });
    e.preventDefault();
  });


  $('#addModelForm').on('submit', function (e) {
    var data = $("#addModelForm").serialize();
    console.log(data);
    $.ajax({
      type: 'post',
      url: "inc/post/model/addmodel.php",
      data: data,
      success: function (cevap) {
        console.log(cevap);
        $("#sonuc").html("" + cevap);
      }
    });
    e.preventDefault();
  });

  $('#addCommentForm').on('submit', function (e) {
    var data = $("#addCommentForm").serialize();
    console.log(data);
    $.ajax({
      type: 'post',
      url: "inc/post/comment/addcomment.php",
      data: data,
      success: function (cevap) {
        console.log(cevap);
        $("#sonuc").html("" + cevap);
      }
    });
    e.preventDefault();
  });


  $('#changeMaintenanceForm').on('submit', function (e) {
    $('#change-modal').modal('toggle');

    var data = $("#changeMaintenanceForm").serialize();
    console.log(data);
    $.ajax({
      type: 'post',
      url: "inc/post/maintenance/changemaintenance.php",
      data: data,
      success: function (cevap) {
        $("#sonuc").html("" + cevap);
      }
    });
    e.preventDefault();
  });


  $('#addMaintenanceForm').on('submit', function (e) {
    var data = $("#addMaintenanceForm").serialize();
    console.log(data);
    $.ajax({
      type: 'post',
      url: "inc/post/maintenance/addmaintenance.php",
      data: data,
      success: function (cevap) {
        console.log(cevap);
        $("#sonuc").html("" + cevap);
      }
    });
    e.preventDefault();
  });

  $('#changeImageForm').on('submit', function (e) {
    $('#change-modal').modal('toggle');

    var data = $("#changeImageForm").serialize();
    console.log(data);
    $.ajax({
      type: 'post',
      url: "inc/post/image/changeimage.php",
      data: data,
      success: function (cevap) {
        $("#sonuc").html("" + cevap);
      }
    });
    e.preventDefault();
  });


  $('#addImageForm').on('submit', function (e) {
    var data = $("#addImageForm").serialize();
    console.log(data);
    $.ajax({
      type: 'post',
      url: "inc/post/image/addimage.php",
      data: data,
      success: function (cevap) {
        console.log(cevap);
        $("#sonuc").html("" + cevap);
      }
    });
    e.preventDefault();
  });

  $('#changeCarForm').on('submit', function (e) {
    $('#change-modal').modal('toggle');

    var data = $("#changeCarForm").serialize();
    console.log(data);
    $.ajax({
      type: 'post',
      url: "inc/post/car/changecar.php",
      data: data,
      success: function (cevap) {
        $("#sonuc").html("" + cevap);
      }
    });
    e.preventDefault();
  });


  $('#addCarForm').on('submit', function (e) {
    var data = $("#addCarForm").serialize();
    console.log(data);
    $.ajax({
      type: 'post',
      url: "inc/post/car/addcar.php",
      data: data,
      success: function (cevap) {
        console.log(cevap);
        $("#sonuc").html("" + cevap);
      }
    });
    e.preventDefault();
  });

});
