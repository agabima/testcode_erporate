var Script = function () {

    $.validator.setDefaults({
        //submitHandler: function() { alert("submitted!"); }
    });

    $().ready(function() {
        // validate the comment form when it is submitted
        $("#commentForm").validate();

        // validate signup form on keyup and submit
        $("#signupForm").validate({
            rules: {
                firstname: "required",
                lastname: "required",
                username: {
                    required: true,
                    minlength: 2
                },
                password: {
                    required: true,
                    minlength: 5
                },
                kategori: {
                    required: true
                },
                gambar:{
                    required: true
                },
                sku:{
                    required: true
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
                harganormal: {
                    digits: true,
                },
                harganet: {
                    digits: true,
                },
                hargamodal: {
                    digits: true,
                },
                produk: {
                    required: true,
                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                agree: "required"
            },
            messages: {
                firstname: "Please enter your firstname",
                lastname: "Please enter your lastname",
                harganormal: "Hanya boleh diisi dengan Angka",
                harganet: "Hanya boleh diisi dengan Angka",
                hargamodal: "Hanya boleh diisi dengan Angka",
                produk: "Mohon Nama Produk diisi",
                username: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 2 characters"
                },
                kategori: "Mohon kategori diisi terlebih dahulu",
                gambar : "Mohon pilih gambar",

                password: {
                    required: "Silahkan isi sebuah password",
                    minlength: "Password harus diisi minimal 5 karakter"
                },
                confirm_password: {
                    required: "Silahkan isi sebuah password",
                    minlength: "Password harus diisi minimal 5 karakter",
                    equalTo: "Silahkan isi sesuai dengan password"
                },
                sku: "Mohon SKU diisi terlebih dahulu",
                email: "Mohon diisi dengan email yang benar",
                agree: "Please accept our policy"
            }
        });

        // propose username by combining first- and lastname
        $("#username").focus(function() {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            if(firstname && lastname && !this.value) {
                this.value = firstname + "." + lastname;
            }
        });

        //code to hide topic selection, disable for demo
        var newsletter = $("#newsletter");
        // newsletter topics are optional, hide at first
        var inital = newsletter.is(":checked");
        var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
        var topicInputs = topics.find("input").attr("disabled", !inital);
        // show when newsletter is checked
        newsletter.click(function() {
            topics[this.checked ? "removeClass" : "addClass"]("gray");
            topicInputs.attr("disabled", !this.checked);
        });
    });


}();