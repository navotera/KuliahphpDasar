<!-- container div close -->
</div>


<div class="footer container-fluid mt-5 py-4 bg-dark text-light">
    <div class="row ">
        <div class="col-12 text-center">
            Created By : Nama Anda
        </div>

    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="<?= get_template_path(); ?>assets/js/common.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<script type="text/javascript">
    // Jquery Dependency
    $('.money').mask('000.000.000', {
        reverse: true
    });
</script>

<script>
    $(function() {
        $('.datepicker').each(function(index, element) {
            new Pikaday({
                field: element,
                format: 'D/M/YYYY',
                position: 'bottom left',
                reposition: false,
                toString(date, format) {
                    // you should do formatting based on the passed format,
                    // but we will just return 'D/M/YYYY' for simplicity
                    const day = date.getDate();
                    const month = date.getMonth() + 1;
                    const year = date.getFullYear();
                    return `${day}-${month}-${year}`;
                },
                parse(dateString, format) {
                    // dateString is the result of `toString` method
                    const parts = dateString.split('/');
                    const day = parseInt(parts[0], 10);
                    const month = parseInt(parts[1], 10) - 1;
                    const year = parseInt(parts[2], 10);
                    return new Date(year, month, day);
                }
            });
        })
    });
</script>


</html>