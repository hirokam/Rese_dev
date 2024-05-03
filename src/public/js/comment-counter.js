// DOMの読み込みが完了したら実行
document.addEventListener('DOMContentLoaded', function() {
    // textareaの要素を取得
    const commentTextarea = document.querySelector('.comment');
    // 文字数表示用の要素を取得
    const charCountSpan = document.querySelector('.constraints');

    // 初期文字数を設定（空のtextareaの場合は0）
    charCountSpan.textContent = '0/400（最高文字数）';

    // 入力内容が変更されるたびに実行される関数
    commentTextarea.addEventListener('input', function() {
        // 入力された文字列を取得
        const inputText = commentTextarea.value;
        // 文字数を取得
        const charCount = inputText.length;
        // 文字数を表示
        charCountSpan.textContent = charCount + '/400（最高文字数）';
    });
});