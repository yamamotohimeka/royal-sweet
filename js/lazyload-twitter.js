//<![CDATA[
//lazy load twitter
var lazyloadtw = false;
window.addEventListener(
  "scroll",
  function () {
    if (
      (document.documentElement.scrollTop != 0 && lazyloadtw === false) ||
      (document.body.scrollTop != 0 && lazyloadtw === false)
    ) {
      (function () {
        var tw = document.createElement("script");
        tw.type = "text/javascript";
        tw.async = true;
        tw.src = "https://platform.twitter.com/widgets.js";
        var sc = document.getElementsByTagName("script")[0];
        sc.parentNode.insertBefore(tw, sc);
      })();

      lazyloadtw = true;
    }
  },
  true
);
//]]>
