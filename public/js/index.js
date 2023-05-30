$(function() {
    // 画像切り替え時にプレビュー表示
    var currentImage = $(".profile-image");
    var imageSrc = currentImage.attr("src");
    $('#file-upload').on('change', function(e) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(".profile-image").attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files[0]);
    });
    $('#delete').on('click', function(e) {
        $(".profile-image").attr('src', imageSrc);
        $("#file-upload").val('');
    });

    $(document).ready(function() {
        // ポップアップメッセージをフェードインする
        $('#edit-message').fadeIn();

        // 数秒後にフェードアウトする
        setTimeout(function() {
            $('#edit-message').fadeOut();
        }, 1500);
    });

    $(document).on('click', '.post_submit', function() {
        //背景をスクロールできないように　&　スクロール場所を維持
        scroll_position = $(window).scrollTop();
        $('body').css({ 'top': -scroll_position });
        // モーダルウィンドウを開く
        $('.post_process').fadeIn();
        $('.modal').fadeIn();
    });
    $(document).on('click', '.modal, .not', function() {
        scroll_position = $(window).scrollTop();
        $('.post_process').fadeOut();
        $('.modal').fadeOut();
    });

    const textarea = document.getElementById('comment');
    const countElement = document.querySelector('.count');

    if (textarea && countElement) {
        textarea.addEventListener('input', function() {
            const count = textarea.value.length;
            countElement.textContent = count + ' / 200';
            if (count > 200) {
                countElement.classList.add('over-limit');
            } else {
                countElement.classList.remove('over-limit');
            }
        });
    }



    $(document).ready(function() {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $(document).on('click', '.comment-favo, .comment-favo-remove', function() {
            var commentId = $(this).data('comment-id');
            var self = $(this);

            // いいねが押された状態であるかを判定
            var isLiked = self.hasClass('comment-favo-remove');

            var url = isLiked ? '/unlike' : '/like';

            $.ajax({
                url: url,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: { commentId: commentId },
                success: function(response) {
                    if (isLiked) {
                        self.removeClass('comment-favo-remove').addClass('comment-favo');
                    } else {
                        self.removeClass('comment-favo').addClass('comment-favo-remove');
                    }
                    self.text(response.count + ' いいね');
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    });

    $(document).ready(function() {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $(document).on('click', '.btn-bookmark', function() {
            var talkroomId = $(this).data('talkroom-id');
            var self = $(this);

            // お気に入り登録がされた状態であるかを判定
            var isBookmark = self.text() === 'お気に入り解除';

            var url = isBookmark ? '/remove_bookmark' : '/save_bookmark';

            $.ajax({
                url: url,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: { talkroomId: talkroomId },
                success: function(response) {
                    if (isBookmark) {
                        self.text('お気に入り登録');
                    } else {
                        self.text('お気に入り解除')
                    }
                    var $message = $('<div class="alert alert-success" id="edit-message">' + response.message + '</div>');
                    $('body').append($message);
                    setTimeout(function() {
                        $message.remove();
                    }, 1500);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    });

    $(document).ready(function() {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $(document).on('click', '.follow-btn', function() {
            var followerId = $(this).data('follower-id');
            var self = $(this);

            // 既にフォローされている状態であるかを判定
            var isFollow = self.text() === 'フォロー解除';

            var url = isFollow ? '/remove_follow' : '/follow_process';

            $.ajax({
                url: url,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    followerId: followerId
                },
                success: function(response) {
                    if (isFollow) {
                        self.text('フォローする');
                    } else {
                        self.text('フォロー解除');
                    }
                    $('.follower-count').text(response.count + 'フォロワー');
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    });

    $(document).ready(function() {
        $('#back-color-select').change(function() {
            var selectedClass = $(this).find('option:selected').attr('class');
            $('#comment').removeClass().addClass(selectedClass);
        });
    });

    $('#color-select').change(function() {
        var selectedColor = $(this).val(); // 選択されたオプションの値を取得
        var changeColorDiv = $('.change-color');

        // 既存のクラスを削除し、選択されたオプションのクラスを追加
        changeColorDiv.removeClass().addClass('change-color ' + selectedColor);
    });

    // パスワード表示ボタンがクリックされたときの処理
    document.getElementById("show-password").addEventListener("click", function() {
        var passwordInput = document.getElementById("password");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    });
});