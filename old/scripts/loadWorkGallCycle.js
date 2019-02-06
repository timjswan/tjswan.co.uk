$(document).ready(function() {
    var docHeight = $(document).height(),
        winHeight = $(window).height(),
        thedialog = $("#dialog").dialog({
            autoOpen: false,
            modal: true,
            close: function(e, ui) { $(this).dialog("close"); },
            draggable: false,
            dialogClass: 'fixed-dialog'
        }),
        cycleCtrlPrev = $('<a></a>').attr("href", "#").attr("id", "prevCtrl").addClass("cycleCtrl").html("&nbsp;"),
    	cycleCtrlNext = $('<a></a>').attr("href", "#").attr("id", "nextCtrl").addClass("cycleCtrl").html("&nbsp;"),
    	dialogCycleCtrlPrev = $('<a></a>').attr("href", "#").attr("id", "dialogPrevCtrl").addClass("cycleCtrl").html("&nbsp;"),
    	dialogCycleCtrlNext = $('<a></a>').attr("href", "#").attr("id", "dialogNextCtrl").addClass("cycleCtrl").html("&nbsp;"),
   		exitDialog = $('<a></a>').attr("href", "#").addClass("dialogExit").click(function() {
            $("#dialog").dialog("close");
        });

    if ($("#mobile").css("display") !== "none") {
        $('.workimgtxt[data-linktype="modal"]').click(function(e) {
            e.preventDefault();
            thedialog
                .load(this.getAttribute("data-modal-url") + " #dialogContent", function(response, status, xhr) {
                    $("#dialog").before(dialogCycleCtrlPrev, dialogCycleCtrlNext);
                    $(".dialogGall").cycle({
                        timeout: 0,
                        fx: 'fade',
                        prev: '#dialogPrevCtrl',
                        next: '#dialogNextCtrl',
                        fit: 1
                    });
                })
                .dialog("option", "minHeight", 557)
                .dialog("option", "width", 761)
                .parent().css({position : "fixed"}).end().dialog('open');
            $("#dialog").before(exitDialog);
        });
    }

    //Since the example copy div hover is controlled by javascript 
    //I don't wan't people with javascript turned off not to be able to see my work :)
    $(".degradelink").hide();
    $(".workimgtxt").css('cursor', function(){
    	if(this.getAttribute('data-linktype') !== "none"){
    		return 'pointer';
    	}
    }).click(function(e) {
        e.preventDefault();
        var linktype = this.getAttribute('data-linktype');

        if (linktype !== "modal" && linktype !== "none") {
            window.open(this.getAttribute('data-worklink'));
        }
    });
    $(".mobileShowHide").click(function() {
        $(".mobileShowHide").toggleClass("down");
        $(".workimgtxt").toggleClass("off");
    });
});