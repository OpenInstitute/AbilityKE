/*
    Elfsight Youtube Gallery
    Version: 3.3.0
    Release date: Mon Oct 07 2019

    https://elfsight.com

    Copyright (c) 2019 Elfsight, LLC. ALL RIGHTS RESERVED
*/

!function(e,n,a){"use strict";n.add("api-key",e.noop),e(function(){const n="elfsight-admin-page-api-key-form",a=e(".elfsight-admin"),t=e("."+n),s=t.find("."+n+"-input"),i=t.find("."+n+"-button-connect"),o=t=>{e("."+n).removeClass([n+"-connect",n+"-success"].join(" ")).addClass(n+"-"+t),a.toggleClass("elfsight-admin-api-key-invalid","success"!==t),c=t,"success"===t?(s.attr("readonly",!0),i.text("Clear API key").addClass("elfsight-admin-button-gray").removeClass("elfsight-admin-button-green")):(s.attr("readonly",!1),i.text("Save API key").addClass("elfsight-admin-button-green").removeClass("elfsight-admin-button-gray"))},l=n=>e.ajax({type:"POST",url:pluginParams.restApiUrl+"update-preferences",data:{option:{name:"api_key",value:n}},dataType:"json",beforeSend:function(e){e.setRequestHeader("X-WP-Nonce",wpApiSettings.nonce)}});let c,d=s.val();(e=>!!e)(d)?o("success"):o("connect"),i.click(()=>{"success"===c&&s.val(""),d===s.val()&&""!==s.val()||(d=s.val(),o(""===d?"connect":"success"),t.addClass(n+"-reload-active"),l(d).then(function(){document.location.reload()}))})})}(window.jQuery,window.elfsightAdminPagesController||{},window);