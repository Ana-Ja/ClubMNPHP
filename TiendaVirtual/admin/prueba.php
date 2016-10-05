<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href='./css/bootstrap.css'>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Gentallela Alela! | </title>

	<!-- Bootstrap core CSS -->

	<link href="css/bootstrap.min.css" rel="stylesheet">

	<link href="fonts/css/font-awesome.min.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet">

	<!-- Custom styling plus plugins -->
	<link href="css/custom.css" rel="stylesheet">
	<link href="css/icheck/flat/green.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/progressbar/bootstrap-progressbar-3.3.0.css">
	<script src="js/jquery.min.js"></script>

	<!--
	[if lt IE 9]>
	    <script src="../assets/js/ie8-responsive-file-warning.js"></script>
	    <![endif]-->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
</head>
<body>
	<button class="btn btn-default source" onclick="new PNotify({
	                                title: 'Non-Blocking Notice',
	                                type: 'dark',
	                                text: 'When you hover over me I\'ll fade to show the elements underneath. Feel free to click any of them just like I wasn\'t even here.',
	                                nonblock: {
	                                    nonblock: true,
	                                    nonblock_opacity: .2
	                                }
	                            });">Non-Blocking Notice</button>

	                            <!-- PNotify -->
	                            <script type="text/javascript" src="js/notify/pnotify.core.js"></script>
	                            <script type="text/javascript" src="js/notify/pnotify.buttons.js"></script>
	                            <script type="text/javascript" src="js/notify/pnotify.nonblock.js"></script>

	                            <script>
	                                $(function () {
	                                    var cnt = 10; //$("#custom_notifications ul.notifications li").length + 1;
	                                    TabbedNotification = function (options) {
	                                        var message = "<div id='ntf" + cnt + "' class='text alert-" + options.type + "' style='display:none'><h2><i class='fa fa-bell'></i> " + options.title + "</h2><div class='close'><a href='javascript:;' class='notification_close'><i class='fa fa-close'></i></a></div><p>" + options.text + "</p></div>";

	                                        if (document.getElementById('custom_notifications') == null) {
	                                            alert('doesnt exists');
	                                        } else {
	                                            $('#custom_notifications ul.notifications').append("<li><a id='ntlink" + cnt + "' class='alert-" + options.type + "' href='#ntf" + cnt + "'><i class='fa fa-bell animated shake'></i></a></li>");
	                                            $('#custom_notifications #notif-group').append(message);
	                                            cnt++;
	                                            CustomTabs(options);
	                                        }
	                                    }

	                                    CustomTabs = function (options) {
	                                        $('.tabbed_notifications > div').hide();
	                                        $('.tabbed_notifications > div:first-of-type').show();
	                                        $('#custom_notifications').removeClass('dsp_none');
	                                        $('.notifications a').click(function (e) {
	                                            e.preventDefault();
	                                            var $this = $(this),
	                                                tabbed_notifications = '#' + $this.parents('.notifications').data('tabbed_notifications'),
	                                                others = $this.closest('li').siblings().children('a'),
	                                                target = $this.attr('href');
	                                            others.removeClass('active');
	                                            $this.addClass('active');
	                                            $(tabbed_notifications).children('div').hide();
	                                            $(target).show();
	                                        });
	                                    }

	                                    CustomTabs();

	                                    var tabid = idname = '';
	                                    $(document).on('click', '.notification_close', function (e) {
	                                        idname = $(this).parent().parent().attr("id");
	                                        tabid = idname.substr(-2);
	                                        $('#ntf' + tabid).remove();
	                                        $('#ntlink' + tabid).parent().remove();
	                                        $('.notifications a').first().addClass('active');
	                                        $('#notif-group div').first().css('display','block');
	                                    });
	                                })
	                            </script>
	                            <script type="text/javascript">
	                                var permanotice, tooltip, _alert;
	                                $(function () {
	                                    new PNotify({
	                                        title: "PNotify",
	                                        type: "dark",
	                                        text: "Welcome. Try hovering over me. You can click things behind me, because I'm non-blocking.",
	                                        nonblock: {
	                                            nonblock: true
	                                        },
	                                        before_close: function (PNotify) {
	                                            // You can access the notice's options with this. It is read only.
	                                            //PNotify.options.text;

	                                            // You can change the notice's options after the timer like this:
	                                            PNotify.update({
	                                                title: PNotify.options.title + " - Enjoy your Stay",
	                                                before_close: null
	                                            });
	                                            PNotify.queueRemove();
	                                            return false;
	                                        }
	                                    });

	                                });
	                            </script>	
	                            <script>
	                                $(document).ready(function () {
	                                    $('.progress .bar').progressbar(); // bootstrap 2
	                                    $('.progress .progress-bar').progressbar(); // bootstrap 3
	                                });
	                            </script>
</body>
</html>