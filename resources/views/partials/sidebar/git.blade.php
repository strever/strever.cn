<div class="sidebar-module">

    <h3><a href="https://github.com/strever" target="_blank">@strever</a> on GitHub</h3>
    <h4>with Repos</h4>
    <ul id="gh_repos">
        <li class="loading"><img style="width: 30px;height: 30px;" src="/images/loading-point.gif"></li>
    </ul>

    <script>

        var github = (function(){
            function escapeHtml(str) {
                return $('<div/>').text(str).html();
            }
            function render(target, repos){
                var i = 0, fragment = '', t = $(target)[0];

                for(i = 0; i < repos.length; i++) {
                    fragment += '<li><a href="'+repos[i].html_url+'">'+repos[i].name+'</a><p>'+escapeHtml(repos[i].description||'')+'</p></li>';
                }

                fragment += '<li><a href="https://github.com/strever" target="_blank">更多···</a></li>';
                t.innerHTML = fragment;
            }
            return {
                showRepos: function(options){
                    $.ajax({
                        url: "https://api.github.com/users/"+options.user+"/repos?sort=pushed&callback=?"
                        , dataType: 'jsonp'
                        , error: function (err) { $(options.target + ' li.loading').addClass('error').text("Error loading feed"); }
                        , success: function(data) {
                            var repos = [];
                            if (!data || !data.data) { return; }
                            for (var i = 0; i < data.data.length; i++) {
                                if (options.skip_forks && data.data[i].fork) { continue; }
                                repos.push(data.data[i]);
                            }
                            if (options.count) { repos.splice(options.count); }
                            render(options.target, repos);
                        }
                    });
                }
            };
        })();


        $(document).ready(function(){
            github.showRepos({
                user: 'Strever',
                count: 3,
                skip_forks: true,
                target: '#gh_repos'
            });
        });
    </script>

</div>