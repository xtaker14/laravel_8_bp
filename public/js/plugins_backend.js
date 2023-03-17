
tinymce.init({
    selector: '.simple',
    menubar: false,
    plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
    ],
    toolbar: 'undo redo | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});

if ($(".datepicker").length > 0) {
    $(".datepicker").datepicker({
        inline: true,
        changeYear: true,
        changeMonth: true,
        dateFormat: "dd-mm-yy",
        yearRange: datepicker_awal + ":" + datepicker_tahundepan,
    });
}

if ($(".tanggal").length > 0) {
    $(".tanggal").datepicker({
        inline: true,
        changeYear: true,
        changeMonth: true,
        dateFormat: "dd-mm-yy",
        yearRange: datepicker_awal + ":" + datepicker_tahundepan,
    });
}

if ($(".tanggalan").length > 0) {
    $(".tanggalan").datepicker({
        inline: true,
        changeYear: true,
        changeMonth: true,
        dateFormat: "dd-mm-yy",
        yearRange: datepicker_awal + ":" + datepicker_tahundepan,
    });
}

if ($("input.time-picker").length > 0) {
    $('input.time-picker').timepicker({
        timeFormat: 'HH:mm:ss',
        interval: 60,
        // minTime: '10',
        // maxTime: '6:00pm',
        // dynamic: false,
        // defaultTime: '11',
        startTime: '10:00',
        dropdown: true,
        scrollbar: true
    });
    // $('input.time-picker').timepicker('setTime', '13:12');
}

// Popup Delete
if ($(".delete-link").length > 0) {
    $(document).on("click", ".delete-link", function (e) {
        e.preventDefault();
        url = $(this).attr("href");
        swal({
            title: "Yakin akan menghapus data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn btn-danger',
            cancelButtonClass: 'btn btn-success',
            buttonsStyling: false,
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: url,
                        success: function (resp) {
                            window.location.href = url;
                        }
                    });
                }
                return false;
            });
    });
}

// Popup disable
if ($(".disable-link").length > 0) {
    $(document).on("click", ".disable-link", function (e) {
        e.preventDefault();
        url = $(this).attr("href");
        swal({
            title: "Yakin akan menonaktifkan data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn btn-danger',
            cancelButtonClass: 'btn btn-success',
            buttonsStyling: false,
            confirmButtonText: "Non Aktifkan",
            cancelButtonText: "Cancel",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: url,
                        success: function (resp) {
                            window.location.href = url;
                        }
                    });
                }
                return false;
            });
    });
}

// Popup approval
if ($(".approval-link").length > 0) {
    $(document).on("click", ".approval-link", function (e) {
        e.preventDefault();
        url = $(this).attr("href");
        swal({
            title: "Anda yakin ingin menyetujui data ini?",
            type: "info",
            showCancelButton: true,
            confirmButtonClass: 'btn btn-danger',
            cancelButtonClass: 'btn btn-success',
            buttonsStyling: false,
            confirmButtonText: "Ya, Setujui",
            cancelButtonText: "Cancel",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: url,
                        success: function (resp) {
                            window.location.href = url;
                        }
                    });
                }
                return false;
            });
    });
}

if ($("#editorku").length > 0 || $(".editorku").length > 0) {
    CKEDITOR.replace('editorku', {
        height: 60,
        // Define the toolbar groups as it is a more accessible solution.
        toolbarGroups: [{
            "name": "basicstyles",
            "groups": ["basicstyles"]
        },
        {
            "name": "links",
            "groups": ["links"]
        },
        {
            "name": "paragraph",
            "groups": ["list", "blocks"]
        },
        {
            "name": "document",
            "groups": ["mode"]
        },

        ],
        // Remove the redundant buttons from toolbar groups defined above.
        removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
    });
}
// Tes

// Replace the <textarea id="editor1"> with a CKEditor 4
// instance, using default configuration.
if ($("#kontenku").length > 0 || $(".kontenku").length > 0) {
    CKEDITOR.replace('kontenku',
        {
            filebrowserBrowseUrl: asset_url + 'assets/ckeditor/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
            filebrowserUploadUrl: asset_url + 'assets/ckeditor/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
            filebrowserImageBrowseUrl: asset_url + 'assets/ckeditor/filemanager/dialog.php?type=1&editor=ckeditor&fldr=='
        }
    );
}
    
//Initialize DataTable Elements 
if ($("table#example1").length > 0) {
    $("table#example1").DataTable();
}

if ($("table#example2").length > 0) {
    $("table#example2").DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
    });
}

$(function () {

    //Initialize Select2 Elements 
    if ($(".select2").length > 0) {
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    }

    if ($(".mselect2").length > 0) {
        $('.mselect2').select2({
            dropdownParent: $('.Tambah')
        });
    }

    if ($(".checkbox-toggle").length > 0) {
        $('.checkbox-toggle').click(function () {
            var clicks = $(this).data('clicks')
            if (clicks) {
                //Uncheck all checkboxes
                $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
                $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
            } else {
                //Check all checkboxes
                $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
                $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
            }
            $(this).data('clicks', !clicks)
        })
    }

    //Handle starring for glyphicon and font awesome
    if ($(".mailbox-star").length > 0) {
        $('.mailbox-star').click(function (e) {
            e.preventDefault()
            //detect type
            var $this = $(this).find('a > i')
            var glyph = $this.hasClass('glyphicon')
            var fa = $this.hasClass('fa')

            //Switch states
            if (glyph) {
                $this.toggleClass('glyphicon-star')
                $this.toggleClass('glyphicon-star-empty')
            }

            if (fa) {
                $this.toggleClass('fa-star')
                $this.toggleClass('fa-star-o')
            }
        })
    }
});

