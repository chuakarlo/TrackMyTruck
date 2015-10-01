$(document).ready(function() {
	// ストライプテーブル
	var stripeMethod = function() {
		// 一覧テーブルのストライプ
		$('.listTable tr').removeClass('listTableOdd');
		$('.listTable tr').removeClass('listTableEven');
		$('.listTable tr:odd').addClass('listTableOdd');
		$('.listTable tr:even').addClass('listTableEven');
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
