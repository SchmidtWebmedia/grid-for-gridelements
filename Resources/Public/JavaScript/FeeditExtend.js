(function(w, $) {
    var F = w.parent.F;

    w.parent.F.dropGridCe = dropGridCe;
    w.parent.F.moveRecordInGrid = moveRecordInGrid;
    w.parent.F.dragCeInsideGridStart = dragCeInsideGridStart;

    // Custom function for grid elements
    // Only for move action
    function dropGridCe(ev) {
        ev.preventDefault();
        var movable = parseInt(ev.dataTransfer.getData('movable'), 10);

        if (movable === 1) {
            var $currentTarget = $(ev.currentTarget);
            var ceUid = parseInt(ev.dataTransfer.getData('movableUid'), 10);
            var moveAfter = parseInt($currentTarget.data('moveafter'), 10);
            var colPos = parseInt($currentTarget.data('colpos'), 10);

            if (ceUid !== moveAfter) {
                F.moveRecordInGrid(ceUid, 'tt_content', moveAfter, colPos, $currentTarget.data('params'));
            }
        } else {
            F.dropCe(ev);
        }
    }

    function dragCeInsideGridStart(ev) {
        ev.stopPropagation();
        F.dragCeStart(ev);
    }

    function moveRecordInGrid(uid, table, beforeUid, colPos, params) {
        this.trigger(F.REQUEST_START);

        var data = {
            uid: uid,
            table: table,
            beforeUid: beforeUid
        };

        if (typeof colPos !== 'undefined') {
            data.colPos = colPos;
        }

        $.ajax({
            url: F._endpointUrl + '&action=move' + params,
            method: 'POST',
            data: data
        }).done(function (data) {
            F.trigger(
                F.UPDATE_CONTENT_COMPLETE,
                {
                    message: data.message
                }
            );
        }).fail(function (jqXHR) {
            F.trigger(
                F.REQUEST_ERROR,
                {
                    message: jqXHR.responseText
                }
            );
        }).always(function () {
            F.trigger(F.REQUEST_COMPLETE);
        });
    }


    $('.t3-frontend-editing__ce').on('dragstart', function (event) {
        var $currentTarget = $(event.currentTarget);
        $currentTarget.addClass('active-drag');
    }).on('dragend', function (event) {
        var $currentTarget = $(event.currentTarget);
        $currentTarget.removeClass('active-drag');
    });
});
