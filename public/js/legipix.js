"use strict";

function debounce(func, wait, immediate) {
    var timeout;
    return function () {
        var context = this, args = arguments;
        var later = function () {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
}

var Global = {
    settings: {
        disabledElements: document.getElementsByClassName("disabled"),
    },
    init: function () {
        this.disableLinks();
    },
    disableLinks: function () {
        var s = this.settings;
        for (var i = s.disabledElements.length - 1; i >= 0; i--) {
            s.disabledElements[i].addEventListener("click", function (e) {
                e.preventDefault();
            })
        }
    }
}

var Cookie = {
    settings: {
        cookieBox: document.getElementById("cookieBox"),
        cookieButton: document.getElementById("cookieButton"),
    },
    init: function () {
        this.loadCookieMessage();
        this.listenCookieButton();

    },
    loadCookieMessage: function () {
        var s = this.settings;
        if (document.cookie.indexOf("acceptedCookies") == -1) {
            s.cookieBox.style.display = "block";
        }
    },
    listenCookieButton: function () {
        var s = this.settings;
        s.cookieButton.addEventListener("click", function () {
            document.cookie = "acceptedCookies=yes; expires=Tue, 19 Jan 2038 03:14:07 UTC;";
            s.cookieBox.style.display = "none";
        }, false);
    }
};

var Poll = {
    settings: {
        pollBars: document.getElementsByClassName("poll__bar__value"),
    },
    init: function () {
        this.animatePollBars();
    },
    animatePollBars: function () {
        var s = this.settings;
        for (var i = s.pollBars.length - 1; i >= 0; i--) {
            s.pollBars[i].style.width = s.pollBars[i].dataset.value;
        }
    }
};

var Konami = {
    settings: {
        bodyClass: document.body.className,
        konamiButtons: document.getElementsByClassName("konami-button"),
        konamiSequence: ["up", "up", "down", "down", "left", "right", "left", "right", "b", "a"],
    },
    init: function () {
        this.listenKonamiSequence();
    },
    listenKonamiSequence: function () {
        var s = this.settings;
        var k = 0;
        for (var i = s.konamiButtons.length - 1; i >= 0; i--) {
            s.konamiButtons[i].addEventListener("click", function () {
                if (this.dataset.button == s.konamiSequence[k]) {
                    if (k === s.konamiSequence.length - 1) {
                        document.body.className = s.bodyClass + " body--konami";
                        setTimeout(function () {
                            document.body.className = s.bodyClass;
                        }, 10000);
                        k = 0;
                    } else {
                        k++;
                    }
                } else {
                    k = 0;
                }
            }, false)
        }
        ;
    }
};

var Background = {
    settings: {
        body: document.body,
        html: document.documentElement,
    },
    init: function () {
        this.parallaxBackground();

    },
    parallaxBackground: function () {
        var s = this.settings;
        var self = this;
        window.addEventListener("load", function () {
            document.body.style.backgroundPosition = "center " + self.positionBackground() + "%";
        }, false);
        window.addEventListener("scroll", function () {
            document.body.style.backgroundPosition = "center " + self.positionBackground() + "%";
        }, false);
    },
    positionBackground: function () {
        var s = this.settings;
        var pageHeight = Math.max(s.body.scrollHeight, s.body.offsetHeight, s.html.clientHeight, s.html.scrollHeight, s.html.offsetHeight),
            scrolledFromTop = (window.pageYOffset || s.html.scrollTop) - (s.html.clientTop || 0),
            maxDisplayed = pageHeight - window.innerHeight;
        return (scrolledFromTop * 100) / maxDisplayed;
    }
};

var FollowTags = {
    settings: {
        followButton: document.getElementById("followTag"),
        followedPath: document.getElementById("followedPath"),
        followTagText: document.getElementById("followTagText"),
        followedTagText: document.getElementById("followedTagText"),
    },
    init: function () {
        this.listenFollowTagButton();
    },
    listenFollowTagButton: function () {
        var s = this.settings;
        var self = this;
        var a = false;
        s.followButton.addEventListener("click", function () {
            if (a === false) {
                a = true;
                s.followedPath.style.display = "block";
                s.followTagText.style.display = "none";
                s.followedTagText.style.display = "inline";
            } else {
                a = false;
                s.followedPath.style.display = "none";
                s.followTagText.style.display = "inline";
                s.followedTagText.style.display = "none";
            }
        });
    },
};

var Emoji = {
    settings: {
        posts: document.getElementsByClassName("withEmoji")
    },
    init: function () {
       this.parseEmojis();
    },
    parseEmojis: function () {
        var s = this.settings;
        for (var i = s.posts.length - 1; i >= 0; i--) {
            var post = s.posts[i],
                content = post.innerHTML;
            post.innerHTML = emojione.toImage(content);
        }
    },
};

var SimpleEditor = {
    settings: {
        editor: document.getElementById("content"),
        jumpButton: document.getElementById("jump"),
        loader: document.getElementById("loader"),
        loaderShown: false,
        preview: document.getElementById("preview"),
    },
    init: function () {
        this.listenEditorAndCompletePreview();
        this.listenJumpButton();
    },
    listenEditorAndCompletePreview: function () {
        var s = this.settings;
        var self = this;
        s.editor.addEventListener("keyup", debounce(function () {
            s.preview.innerHTML = "";
            self.showOrHideLoader();
            setTimeout(function () {
                self.showOrHideLoader();
                self.parseText();
            }, 1000)
        }, 600), false);
    },
    listenJumpButton: function () {
        var s = this.settings;

        s.jumpButton.addEventListener("click", function (e) {
            e.preventDefault();
            s.editor.focus();
        }, false);
    },
    showOrHideLoader: function () {
        var s = this.settings;
        if (s.loaderShown === false) {
            s.loaderShown = true;
            s.loader.style.display = "block";
        }
        else {
            s.loaderShown = false;
            s.loader.style.display = "none";
        }
    },
    parseText: function () {
        var s = this.settings;
        s.preview.innerHTML = s.editor.value;
    },
};
