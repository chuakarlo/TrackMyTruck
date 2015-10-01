$(document).ready(function() {
	// ストライプテーブル
	var stripeMethod = function() {
		// 検索テーブルのストライプ
		// 詳細、訂正、新規、確認、完了テーブルのストライプ
		$('.dataTable tr').removeClass('dataTableOdd');
		$('.dataTable tr').removeClass('dataTableEven');
		$('.dataTable tr:odd').addClass('dataTableOdd');
		$('.dataTable tr:even').addClass('dataTableEven');
	};
	$(stripeMethod);

	// 行を一つ上に移動させる
	$(document).on("click", ".upList", function() {
		var t = $(this).parent().parent();
		if ($(t).prev("tr")) {
			$(t).insertBefore($(t).prev("tr")[0]);
		}
		stripeMethod();
	});

	// 行を一つ下に移動させる
	$(document).on("click", ".downList", function() {
		var t = $(this).parent().parent();
		if ($(t).next("tr")) {
			$(t).insertAfter($(t).next("tr")[0]);
		}
		stripeMethod();
	});
});
