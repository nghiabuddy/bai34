      //<!--
      // bai tap co nhieu cach lam, code trong tap tin nay chi la vi du ve 1 trong nhung cach lam de sinh vien tham khao
      var IMAGE_PATHS = [];
      IMAGE_PATHS[0] = "img/hp.jpg";
      IMAGE_PATHS[1] = "img/dell.jpg";
      IMAGE_PATHS[2] = "img/acer.jpg";
      IMAGE_PATHS[3] = "img/asus.jpg";

      function changeSlide(pos) {
          var laptopImg = document.getElementById("laptopImg");
          var laptopSel = document.getElementsByName("laptopSel")[0];

          var new_var = (parseInt(laptopSel.value) + pos + IMAGE_PATHS.length) % IMAGE_PATHS.length;
          laptopSel.value = new_var;
          chooseSlide(new_var);

      }

      function chooseSlide(pos) {
          var laptopImg = document.getElementById("laptopImg");
          laptopImg.src = IMAGE_PATHS[pos];
      }
      //-->