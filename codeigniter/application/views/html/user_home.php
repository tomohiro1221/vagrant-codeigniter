<div class="container user-home">
    <div class="row">
        <div class="col-md-3 col-md-offset-1">
            <div class="profile-sidebar">
                <img src="/img/hitsugaya.jpg" alt="hitsugaya" class="img-circle profile-img">
                <?php if ($username) echo $username ?><hr>
                <ul class="profile-info">
                    <li><strong>Bio</strong></li>
                    <li class="profile-info-detail">Hitsugaya-kun / Birthdate: December 20th / Rank: Captain of Squad 10 / Daiguren Hyorinmaru!</li>
                    <li><strong>Location</strong></li>
                    <li class="profile-info-detail">BLEACH / Soul Society</li>
                </ul>
            </div>
        </div>
        <div class="col-md-4 col-md-offset-1 wrapper">
            <?php echo form_open() ?>
                <textarea id="tweet-box" rows="2" name="content"></textarea>
                <button id="tweet-button" class="btn btn-warning" type="submit" name="submit">Tweet</button>
            </form>
            <div id="tweet-column">
                <ul class="tweet-list">
                    <li id="tweet-list-top"><h4>Tweets</h4><hr></li>
                    <!--<li class="tweet">
                        <strong>realhacker</strong>&nbsp;tweeted<br/>
                        &gt;&gt;&gt;<span class="tweet-content">hello world I'm twweeitn form user_home. I need a long tweet to see if this is working correctly. </span>
                        <div class="tweeted-time">8/13</div><hr>
                    </li>-->
                    <li id="tweet-list-bottom">
                        <?php echo form_open() ?>
                            <span id="load-more-tweets">Load more tweets</span>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>