$(document).ready(function() {
	var tweets = 0;
	$.post('/users/load_latest_tweets', {}, function(data) {
		if (data) {
			$.each(data, function(index, tweet_data) {
				append_new_tweet(parse_tweet(tweet_data));
			});
		}
	});

	$('#tweet-button').click(function(event) {
		event.preventDefault();
		var content = $('#tweet-box').val();
		post(content);
	});

	$('#load-more-tweets').click(function(event) {
		event.preventDefault();
		$.post('/users/load_older_tweets', {'tweets': tweets}, function(data) {
			if (data) {
				data.reverse();
				$.each(data, function(index, tweet_data) {
					show_old_tweet(parse_tweet(tweet_data));
				});
			}
		});
	});

	function post(content) {
		$('#tweet-box').val('');
		$.post('/users/tweet', {'content': content}, function(data) {
			if (data) {
				//$('#tweet-list-top').after(parse_tweet(data));
				append_new_tweet(parse_tweet(data));
			}
		}, "json");
	}

	function append_new_tweet(new_tweet) {
		tweets += 1;
		$('#tweet-list-top').after(new_tweet);
	}

	function show_old_tweet(old_tweet) {
		tweets += 1;
		$('#tweet-list-bottom').before(old_tweet);
	}

	function parse_tweet(data) {
		return '<li class="tweet"><strong>' + data.username + '</strong>&nbsp;tweeted<br/>&gt;&gt;&gt;<span class="tweet-content">' + data.content + '</span><div class="tweeted-time">' + data.posted_time + '</div><hr></li>';
	}

	$('#load-more-tweets').mouseenter(function() {
		$(this).css('text-decoration', 'underline');
	});

	$('#load-more-tweets').mouseleave(function() {
		$(this).css('text-decoration', 'none');
	});
});
