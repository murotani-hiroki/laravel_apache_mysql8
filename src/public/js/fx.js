$(function() {
    // 初期表示（一覧検索）
    doAjax({
        url: '/search',
        type: 'post',
        data: {},
    }).done (function(data) {
        $('#trade-list-box').html(data);
        sumTotal();
    });

    // searchボタン
    $('#searchBtn').on('click', function() {
        // 一覧検索
        doAjax({
            url: '/search',
            type: 'post',
            data: { fromDate: $('#fromDate').val(), toDate: $('#toDate').val() },
        }).done (function(data) {
            // 正常の場合
            $('#trade-list-box').html(data);
            sumTotal();
        });
    });

    // addボタン
    $('#addBtn').on('click', function() {
        // モーダルを新規表示
        doAjax({
            url: '/new',
            type: 'post',
            data: {},
        }).done (function(data) {
            $('body').append(data);
        });
    });

    // deleteボタン
    $('#deleteBtn').on('click', function() {
        var deleteIds = $('.deleteId:checked').map(function() {
            return $(this).val();
        }).get();
        doAjax({
            url: '/delete',
            type: 'post',
            data: { deleteIds: deleteIds }
        }).done (function(data) {
            if (data) {
                alert(data.message);
                $('#searchBtn').trigger('click');
            }
            sumTotal();
        });
    });

    // IDクリック
    $(document).on('click', '.tradeId', function(e) {
        e.preventDefault();
        // モーダルを編集表示
        doAjax({
            url: '/edit',
            type: 'post',
            data: { id: $(this).html() },
        }).done (function(data) {
            $('body').append(data);
        });
    });

    // モーダル saveボタン
    $(document).on('click', '#saveBtn', function() {
        doAjax({
            url: '/save',
            type: 'post',
            data: {
                id: $('#tradeId').html(),
                tradingDate: $('#tradingDate').val(),
                settlementDate: $('#settlementDate').val(),
                currencyPairId: $('#currencyPair').val(),
                tradeType: $('[name="tradeType"]:checked').val(),
                quantity: $('#quantity').val(),
                entryPrice: $('#entryPrice').val(),
                exitPrice: $('#exitPrice').val(),
                stopLoss: $('#stopLoss').val(),
                profit: $('#profit').val(),
                comment: $('#comment').val()
            },
        }).done (function(data) {
            // 正常の場合
            alert(data.message);
            // モーダルを閉じる。
            $('#modalContainer').remove();
            $('#searchBtn').trigger('click');
            sumTotal();
        });
    });

    function doAjax(data) {
        var deferred = $.Deferred();
        data.headers = { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') };

        $.ajax(data).done(function(data) {
            // 利用側の正常処理
            deferred.resolve(data);
        }).fail(function (data){
            // エラーの場合
            const errors = data.responseJSON.errors;
            const messages = Object.keys(errors).map(key => errors[key].join('\n'));
            alert(messages.join('\n'));
        });

        return deferred.promise();
            
    }

    // モーダル枠外のクリック
    $(document).on('click', '.overlay', function() {
        // モーダルを閉じる。
        $('#modalContainer').remove();
    });

    // 合計の算出
    function sumTotal() {
        var jpyTotal = 0;
        $('#trade-list').find('tr').filter(function() {
            return $(this).find('td').eq(3).text().endsWith('JPY')
        }).each(function(i) {
            jpyTotal += parseFloat($(this).find('.profit').text());
        })

        var usdTotal = 0;
        $('#trade-list').find('tr').filter(function() {
            return $(this).find('td').eq(3).text().endsWith('USD')
        }).each(function(i) {
            usdTotal += parseFloat($(this).find('.profit').text());
        })
        
        $('#jpyTotal').html(jpyTotal);
        $('#usdTotal').html(usdTotal);
        [$('#jpyTotal'), $('#usdTotal')].forEach(function(e, i) {
            if (parseFloat(e.html()) < 0) {
                e.addClass('minus');
            }
        })
    }
})
