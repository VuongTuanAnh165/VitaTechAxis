<script type="text/javascript">
    $(document).ready(function() {
        function resposiveNav() {
            var width = $(window).width();
            if (width >= 768) {
                $(".menu-customize").addClass("side-menu").removeClass("menu");
                $(".icon-customize").addClass("side-menu__icon").removeClass("menu__icon");
                $(".title-customize").addClass("side-menu__title").removeClass("menu__title");
            } else {
                $(".menu-customize").removeClass("side-menu").addClass("menu");
                $(".icon-customize").removeClass("side-menu__icon").addClass("menu__icon");
                $(".title-customize").removeClass("side-menu__title").addClass("menu__title");
            }
        }
        resposiveNav()
        $(window).resize(function() {
            resposiveNav()
        })

        function setCookie(cname, cvalue, exdays) {
            const d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            let expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        function getCookie(cname) {
            let name = cname + "=";
            let ca = document.cookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        function checkLightDark() {
            let switcher = $(".dark-mode-switcher").find(".dark-mode-switcher__toggle");
            let html = $("html");
            if (getCookie("mode") == 'light') {
                switcher.removeClass("dark-mode-switcher__toggle--active");
                html.addClass("light");
                html.removeClass("dark");
            } else {
                switcher.addClass("dark-mode-switcher__toggle--active");
                html.removeClass("light");
                html.addClass("dark");
            }
        }
        checkLightDark();
        $(".dark-mode-switcher").on("click", function() {
            if (getCookie("mode") == 'light') {
                setCookie("mode", 'dark', 365);
            } else {
                setCookie("mode", 'light', 365);
            }
            checkLightDark();
        });

        //check hide password
        function checkPassword(input) {
            let type = input.attr("type");
            if (type == "password") {
                input.closest(".div-password").find(".eye").show();
                input.closest(".div-password").find(".eye-off").hide();
            } else {
                input.closest(".div-password").find(".eye").hide();
                input.closest(".div-password").find(".eye-off").show();
            }
        }
        $(".login__input").each(function() {
            checkPassword($(this));
        });

        $(".eye, .eye-off").on("click", function(e) {
            let input = $(this).closest(".div-password").find(".login__input");
            if ($(this).hasClass("eye")) {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
            checkPassword(input);
        })
    })
</script>
