 function versionLog(msg) {
            document.getElementById('versionCheckLog').innerHTML = msg;
        }

        function getAVCRMCommitIdFromVersion() {
            //var s = options.version.split('-');

           // if(s.length !== 3) return null;
           // if(s[2][0] === 'g') {
             //   var v = s[2].split('_')[0].substring(1, 8);
             ///   if(v.length === 7) {
                    versionLog('Installed git commit id of AV-CRM is ' + 3);
                    //document.getElementById('AV-CRMcommit').innerHTML = v;
                    //return v;
              //  }
           // }
            return null;
        }

        function getAVCRMCommitId(force, callback) {

            $.ajax({
                url: '.././.git/refs/heads/master',
                async: true,
                cache: false,
                xhrFields: { withCredentials: true } // required for the cookie
            })
            .done(function(data) {
                data = data.replace(/(\r\n|\n|\r| |\t)/gm,"");

                var c = getAVCRMCommitIdFromVersion();
                if(c !== null && data.length === 40 && data.substring(0, 7) !== c) {
                    versionLog('Installed files commit id and internal AV-CRM git commit id do not match');
                    data = c;
                }

                if(data.length >= 7) {
                    versionLog('Installed git commit id of AV-CRM is ' + data);
                    document.getElementById('AV-CRMcommit').innerHTML = data.substring(0, 7);
                    callback(data);
                }
            })
            .fail(function() {
                versionLog('Failed to download installed git commit id from AV-CRM!');

                if(force === true) {
                    var c = getAVCRMCommitIdFromVersion();
                    if(c === null) versionLog('Cannot find the git commit id of AV-CRM.');
                    callback(c);
                }
                else
                    callback(null);
            });
        }

        function getGithubLatestCommit(callback) {
            versionLog('Downloading latest git commit id info from github...');

            $.ajax({
                url: 'https://api.github.com/repos/albsector/AV-CRM/commits',
                async: true,
                cache: false
            })
            .done(function(data) {
                versionLog('Latest git commit id from github is ' + data[0].sha);
                callback(data[0].sha);
            })
            .fail(function() {
                versionLog('Failed to download installed git commit id from github!');
                callback(null);
            });
        }

        function checkForUpdate(force, callback) {
            getAVCRMCommitId(force, function(sha1) {
                if(sha1 === null) callback(null, null);

                getGithubLatestCommit(function(sha2) {
                    callback(sha1, sha2);
                });
            });

            return null;
        }

        function notifyForUpdate(force) {
            versionLog('<p>checking for updates...</p>');

            var now = Date.now();

            if(typeof force === 'undefined' || force !== true) {
                var last = loadLocalStorage('last_update_check');

                if(typeof last === 'string')
                    last = parseInt(last);
                else
                    last = 0;

                if(now - last < 3600000 * 8) {
                    // no need to check it - too soon
                    return;
                }
            }

            checkForUpdate(force, function(sha1, sha2) {
                var save = false;
                console.log(sha1);
                console.log(sha2);

                if(sha1 === null) {
                    save = false;
                    versionLog('<p><big>Failed to get your AV-CRM git commit id!</big></p><p>You can always get the latest AV-CRM from <a href="https://github.com/albsector/AV-CRM" target="_blank">its github page</a>.</p>');
                }
                else if(sha2 === null) {
                    save = false;
                    versionLog('<p><big>Failed to get the latest git commit id from github.</big></p><p>You can always get the latest AV-CRM from <a href="https://github.com/albsector/AV-CRM" target="_blank">its github page</a>.</p>');
                }
                else if(sha1 === sha2) {
                    save = true;
                    versionLog('<p><big>You already have the latest AV-CRM!</big></p><p>No update yet?<br/>Probably, we need some motivation to keep going on!</p><p>If you haven\'t already, <a href="https://github.com/albsector/AV-CRM" target="_blank">give AV-CRM a <b>Star</b> at its github page</a>.</p>');
                }
                else {
                    save = true;
                    var compare = 'https://github.com/albsector/AV-CRM/compare/' + sha1.toString() + '...' + sha2.toString();

                    versionLog('<p><big><strong>New version of AV-CRM available!</strong></big></p><p>Latest commit: <b><code>' + sha2.substring(0, 7).toString() + '</code></b></p><p><a href="' + compare + '" target="_blank">Click here for the changes log</a> since your installed version, and<br/><a href="https://github.com/albsector/AV-CRM/" target="_blank">click here for directions on updating</a> your AV-CRM installation.</p><p>We suggest to review the changes log for new features you may be interested, or important bug fixes you may need.<br/>Keeping your AV-CRM updated, is generally a good idea.</p>');

                    document.getElementById('update_badge').innerHTML = '!';
                }

               // if(save)
                    //saveLocalStorage('last_update_check', now.toString());
            });
        }
