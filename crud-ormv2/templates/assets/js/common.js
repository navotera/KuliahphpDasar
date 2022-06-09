function confirmDelete() {
    event.preventDefault(); // prevent form submit
    var form = event.target.form; // storing the form
            swal({
      title: "Yakin ingin menghapus?",
      text: "Data tidak bisa dikembalikan",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, Lanjutkan!",
      cancelButtonText: "Batal!",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm){
      if (isConfirm) {
        form.submit();          // submitting the form when user press yes
      } else {
        swal("Cancelled", "Data aman :)", "error");
      }
    });
    }