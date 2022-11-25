"use strict";function _slicedToArray(e,t){return _arrayWithHoles(e)||_iterableToArrayLimit(e,t)||_unsupportedIterableToArray(e,t)||_nonIterableRest()}function _nonIterableRest(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}function _iterableToArrayLimit(e,t){var r=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=r){var n,o,a=[],c=!0,s=!1;try{for(r=r.call(e);!(c=(n=r.next()).done)&&(a.push(n.value),!t||a.length!==t);c=!0);}catch(e){s=!0,o=e}finally{try{c||null==r.return||r.return()}finally{if(s)throw o}}return a}}function _arrayWithHoles(e){if(Array.isArray(e))return e}function _createForOfIteratorHelper(e,t){var r="undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(!r){if(Array.isArray(e)||(r=_unsupportedIterableToArray(e))||t&&e&&"number"==typeof e.length){r&&(e=r);var n=0,t=function(){};return{s:t,n:function(){return n>=e.length?{done:!0}:{done:!1,value:e[n++]}},e:function(e){throw e},f:t}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var o,a=!0,c=!1;return{s:function(){r=r.call(e)},n:function(){var e=r.next();return a=e.done,e},e:function(e){c=!0,o=e},f:function(){try{a||null==r.return||r.return()}finally{if(c)throw o}}}}function _unsupportedIterableToArray(e,t){if(e){if("string"==typeof e)return _arrayLikeToArray(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);return"Map"===(r="Object"===r&&e.constructor?e.constructor.name:r)||"Set"===r?Array.from(e):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?_arrayLikeToArray(e,t):void 0}}function _arrayLikeToArray(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}function _typeof(e){return(_typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}!function(r){var n={};function o(e){if(n[e])return n[e].exports;var t=n[e]={i:e,l:!1,exports:{}};return r[e].call(t.exports,t,t.exports,o),t.l=!0,t.exports}o.m=r,o.c=n,o.d=function(e,t,r){o.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},o.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},o.t=function(t,e){if(1&e&&(t=o(t)),8&e)return t;if(4&e&&"object"==_typeof(t)&&t&&t.__esModule)return t;var r=Object.create(null);if(o.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var n in t)o.d(r,n,function(e){return t[e]}.bind(null,n));return r},o.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return o.d(t,"a",t),t},o.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},o.p="",o(o.s=0)}([function(e,t){function r(e){var t=(e=e.target).closest("button");l=Math.abs(l),t.classList.contains("cardnav-arrow-previous")&&(l=-Math.abs(l)),e.closest(".multi-panels").querySelector("ul").scrollBy({left:l,behavior:"smooth"})}function n(e,t){e.forEach(function(e){!1===e.isIntersecting?0==+e.target.dataset.order&&e.target.closest(".cards-scroll")?e.target.closest(".cards-scroll").querySelector("button.cardnav-arrow-previous").disabled=!1:+e.target.dataset.order&&e.target.closest(".cards-scroll")&&(e.target.closest(".cards-scroll").querySelector("button.cardnav-arrow-next").disabled=!1):0==+e.target.dataset.order&&e.target.closest(".cards-scroll")?e.target.closest(".cards-scroll").querySelector("button.cardnav-arrow-previous").disabled=!0:+e.target.dataset.order&&e.target.closest(".cards-scroll")&&(e.target.closest(".cards-scroll").querySelector("button.cardnav-arrow-next").disabled=!0)})}var l=350;0<document.querySelectorAll(".cards-scroll .multi-panels ul").length&&(document.querySelectorAll(".cards-scroll .multi-panels ul").forEach(function(e){var t;e.parentNode.parentNode.classList.contains("icon-panel")||e.parentNode.parentNode.classList.contains("store-cards-dynamic")||(t=new IntersectionObserver(n,{root:e,rootMargin:"0px",threshold:.999}),e=e.querySelectorAll("li"),t.observe(e[0]),t.observe(e[e.length-1]))}),document.querySelectorAll(".cards-scroll .cardnav button").forEach(function(e){e.addEventListener("click",r)}));var o,u=function(e,t){return t=e&&-1!==e.indexOf("ap-en")?t+"&country="+function(){for(var e=document.cookie.split(";"),t=0;t<e.length;t++){var r=e[t].split("=");if("ap_selector"==r[0].trim()){var n=decodeURIComponent(r[1]);if(0<=["nz","my","th","ph"].indexOf(n))return decodeURIComponent(r[1])}}return""}():t};String.prototype.formatUnicorn=String.prototype.formatUnicorn||function(){var e=this.toString();if(arguments.length){var t,r=_typeof(arguments[0]),n="string"===r||"number"===r?Array.prototype.slice.call(arguments):arguments[0];for(t in n)e=e.replace(new RegExp("\\{"+t+"\\}","gi"),n[t])}return e};function s(){var e=document.querySelector(".multi-panels").dataset.baseurl;if(document.getElementById("compareTray")&&document.getElementById("compareTray").remove(),0!=d.size){d.size===i&&document.querySelectorAll(".pure-material-checkbox input:not(:checked)").forEach(function(e){e.disabled=!0}),d.size<i&&document.querySelectorAll(".pure-material-checkbox input:disabled").forEach(function(e){e.disabled=!1});var t=document.querySelector("body"),r=document.createElement("div");r.style.width="100%",r.id="compareTray",r.style.position="fixed",r.style.bottom="0";var n=document.createElement("div");n.setAttribute("role","region"),n.setAttribute("aria-label","compare products");var o=j(e,"compare_up_to").formatUnicorn(i);if(n.innerHTML="<div class='compareTrayInnerText'>"+o+"</div><div class='piecesHolder'></div>",r.append(n),d.forEach(function(e,t){var r=document.createElement("div");r.classList.add("piece"),r.innerHTML="<span>".concat(e.name,"</span><button class='remove' data-sku='").concat(t,'\'>\n    <?xml version="1.0" ?>\n    <!DOCTYPE svg  PUBLIC \'-//W3C//DTD SVG 1.1//EN\'  \'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd\'>\n    <svg style="width:12px;height:12px;" enable-background="new 0 0 256 256" height="256px" id="Layer_1" version="1.1" viewBox="0 0 256 256" width="256px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">\n    <path style="fill:rgb(153,153,153);" d="M137.051,128l75.475-75.475c2.5-2.5,2.5-6.551,0-9.051s-6.551-2.5-9.051,0L128,118.949L52.525,43.475  c-2.5-2.5-6.551-2.5-9.051,0s-2.5,6.551,0,9.051L118.949,128l-75.475,75.475c-2.5,2.5-2.5,6.551,0,9.051  c1.25,1.25,2.888,1.875,4.525,1.875s3.275-0.625,4.525-1.875L128,137.051l75.475,75.475c1.25,1.25,2.888,1.875,4.525,1.875  s3.275-0.625,4.525-1.875c2.5-2.5,2.5-6.551,0-9.051L137.051,128z"/></svg>\n    </button>'),n.querySelector(".piecesHolder").append(r)}),d.size<i)for(var a=0;a<i-d.size;a++){var c=document.createElement("div");c.classList.add("empty-piece"),n.querySelector(".piecesHolder").append(c)}o=document.createElement("div");o.classList.add("compareButton"),o.innerHTML='<button id="goto-compare-page" class="button-primary cta-compare" data-product-target-url=""></button>',n.append(o);o=o.querySelector("button");o.addEventListener("click",function(){window.location=e+"/productcompare?category={0}&products={1}".formatUnicorn("audio%2Fgaming-headsets",Array.from(d.keys()).join(","))}),d.size<=1?(o.classList.add("button-inactive"),o.innerText=j(e,"select_another"),o.disabled=!0):(o.classList.remove("button-inactive"),o.innerText=j(e,"compare_products").formatUnicorn(d.size,i),o.disabled=!1),t.append(r),t.querySelectorAll("button.remove").forEach(function(e){e.addEventListener("click",function(e){e=e.currentTarget.dataset.sku;d.delete(e),s(),document.querySelector("input[data-sku='".concat(e,"']")).checked=!1})})}}function z(e){var t=e.hasOwnProperty("color")?e.color:"blue",r=e.hasOwnProperty("innerHTML")?e.innerHTML:"";if(0!==r.length){e=document.createElement("div");return e.classList.add("genpnx"),e.classList.add("product-badge"),e.classList.add("badge-"+t),e.classList.add("genpnx"),e.innerHTML=r,e}}var i=window.innerWidth<768?2:3,d=new Map,p=function(e){return-1!==e.indexOf("hk-zh")?"&lang=zh_hk":""},f=function(e){var t=new Map;t.set("jp-jp","jp"),t.set("kr-kr","kr"),t.set("ap-en","ap"),t.set("br-pt","bt"),t.set("tw-zh","cht");var r,n="en",o=_createForOfIteratorHelper(t);try{for(o.s();!(r=o.n()).done;){var a=_slicedToArray(r.value,2),c=a[0],s=a[1];if(-1!==e.indexOf(c)){n=s;break}}}catch(e){o.e(e)}finally{o.f()}return"en"!==n?"localhost"===location.hostname?"http://localhost:3003/ap-en/api/product/[pid]?locale=**_**":"https://www.razer.com/ap-en/api/product/[pid]?locale=**_**":null},j=function(e,t){var r=new Map;r.set("fr-fr","fr"),r.set("de-de","de"),r.set("hk-zh","cht"),r.set("es-es","es"),r.set("it-it","it"),r.set("jp-jp","jp"),r.set("kr-kr","kr"),r.set("ap-en","en"),r.set("br-pt","bt"),r.set("tw-zh","cht");var n,o={preOrderStock:{fr:"Pré-commande",de:"Vorbestellen",cht:"預購",es:"Reserva",it:"Pre-ordine",en:"Pre Order"},inStock:{fr:"Acheter",de:"Kaufen",cht:"購買",es:"Comprar",it:"Acquista",en:"Buy",jp:"購入する",kr:"구입"},lowStock:{fr:"Acheter",de:"Kaufen",cht:"購買",es:"Comprar",it:"Acquista",en:"Buy"},outOfStock:{fr:"M'informer",de:"Benachrichtigen",cht:"通知我",es:"Notificarme",it:"Avvisami",en:"Notify Me"},off:{fr:"de remise",de:"Rabatt",cht:"折扣",es:"DE DESCUENTO",it:"DI SCONTO",en:"off"},from:{fr:"À partir de <br> $XX",de:"Ab <br> $XX",cht:"$XX <br> 起",es:"Desde <br> $XX",it:"Da <br> $XX",en:"From <br> $XX"},compare:{fr:"Comparer",de:"Vergleichen",cht:"比較",es:"Comparar",it:"Confronta",en:"Compare"},select_another:{fr:" Sélectionner un autre produit pour comparer ",de:" Ein anderes Produkt zum Vergleich laden ",cht:" 選取其他產品進行比較 ",es:" Seleccionar otro para comparar ",it:" Scegline un altro per il confronto ",en:" Select another to compare "},compare_products:{fr:" Comparer les produits ({0} sur {1}) "," Produkte vergleichen ({0} von {1}) ":"Compare",cht:" 比較產品 ({0} / {1})",es:" Comparar productos ({0} de {1}) ",it:"Confronta prodotti: da ({0} a {1})",en:"Compare products ({0} of {1})"},compare_up_to:{fr:" Comparer<span>Jusqu’à {0}&nbsp;produits</span>",de:" Vergleichen<span> Bis zu {0} Produkte </span>",cht:" 比較 <span> 最多 {0} 個產品 </span>",es:" Comparar <span> Hasta {0} productos </span>",it:" Confronta <span> Fino a {0} prodotti </span>",en:"Compare <span>Up to {0} products</span>"}},a="en",c=_createForOfIteratorHelper(r);try{for(c.s();!(n=c.n()).done;){var s=_slicedToArray(n.value,2),i=s[0],l=s[1];if(-1!==e.indexOf(i)){a=l;break}}}catch(e){c.e(e)}finally{c.f()}return o[t]?o[t][a]:null},m=function(e){var t=new Map;t.set("us-en","razerUs"),t.set("au-en","razerAu"),t.set("hk-en","razerHk"),t.set("hk-zh","razerHk"),t.set("sg-en","razerSg"),t.set("de-de","razerDe"),t.set("es-es","razerEs"),t.set("eu-en","razerEu"),t.set("fr-fr","razerFr"),t.set("it-it","razerIt"),t.set("gb-en","razerUk"),t.set("ca-en","razerCa"),t.set("jp-jp","jp-jp"),t.set("kr-kr","kr-kr"),t.set("ap-en","ap-en"),t.set("tw-zh","tw-zh");var r,n="razerUs",o=_createForOfIteratorHelper(t);try{for(o.s();!(r=o.n()).done;){var a=_slicedToArray(r.value,2),c=a[0],s=a[1];if(-1!==e.indexOf(c)){n=s;break}}}catch(e){o.e(e)}finally{o.f()}return n},y=function(e,w,k){var t=document.querySelector("[data-parentid='".concat(k,"']")),L=t.parentNode.classList.contains("show-summaries"),T=t.parentNode.classList.contains("discount-badge"),A=t.parentNode.classList.contains("show-badge");t.parentNode.classList.contains("collapsible");var r=(r=t.dataset.skus)&&r.split(",").map(function(e){return e.replace(/  |\r\n|\n|\r/gm,"")}),x=new Map;r.forEach(function(t){t.split("|").map(function(e){return e.trim()}).forEach(function(e){return x.set(e,t)})});var n=(n=""===t.dataset.images?"[]":t.dataset.images)||"[]",q=new Map;n=JSON.parse(n);for(var o=0;o<n.length;o++)q.set(n[o].image.SKU,n[o].image.url);for(var a=(a=""===t.dataset.collapse?"[]":t.dataset.collapse)||"[]",E=(a=JSON.parse(a)).map(function(e){return e.SKU}),_=new Map,o=0;o<a.length;o++)_.set(a[o].SKU,a[o]);var c=(c=""===t.dataset.overridelinks?"[]":t.dataset.overridelinks)||"[]";c=JSON.parse(c);var C=new Map;for(o=0;o<c.length;o++)C.set(c[o].SKU,c[o]);var s=(s=""===t.dataset.promoliner?"[]":t.dataset.promoliner)||"[]";(s=JSON.parse(s)).map(function(e){return e.SKU});var O=new Map;for(o=0;o<s.length;o++)O.set(s[o].SKU,s[o]);var i=t.dataset.overrideribbons&&""!==t.dataset.overrideribbons?t.dataset.overrideribbons:"[]",i=JSON.parse(i),M=new Map;for(o=0;o<i.length;o++)M.set(i[o].SKU,i[o]);var l=[];e.map(function(e){return e&&(e.code||e.productID+"")}).forEach(function(e){x.has(e)&&l.push(x.get(e))}),(r?r.filter(function(e){return!l.includes(e)}):[]).forEach(function(e){e=e.replaceAll("|","_");document.querySelector("#panel-".concat(e,"-").concat(k))&&document.querySelector("#panel-".concat(e,"-").concat(k)).remove()}),e.forEach(function(e){if(!e.code&&!e.vendor)return!1;var t,r,n=0<=E.indexOf(e.code),o=e.code||e.productID,a=e.badge,c=n?e.baseProductName:e.name,s=(x.has(o)?x.get(o):o).toString().replaceAll("|","_");c=c||e.displayName,"string"!=typeof o&&(o+=""),n&&_.get(o).suffix&&(c=c+" "+_.get(o).suffix),M.has(o.toString())&&(t=M.get(o.toString()),0!==Object.keys(t).filter(function(e){return"color"===e}).length&&0!==t.color.length||(t.color="blue"),0<Object.keys(t).filter(function(e){return"displayName"===e}).length&&0<t.displayName.length&&(a=t)),e.vendor?(u=e.thumbnail[0].image.url,d=e.page_url,e.stock={},e.stock.stockLevelStatus="inStock",(r={}).priceType="BUY",r.formattedValue=e.priceWithDiscount,l=e.priceWithDiscount):(u=q.get(o)||e.images.filter(function(e){return"product"===e.format&&"PRIMARY"===e.imageType})[0].url,r=e.price,l=e.price.formattedValue,d=e.url),e.hasOwnProperty("markDownPrice")&&!T&&(l="<span>".concat(e.markDownPrice.price.formattedValue,'</span><br><span class="savings"><del>').concat(e.price.formattedValue,"</del><br>(").concat(e.markDownPrice.savings,"% ").concat(j(w,"off"),")</span>"));var i=document.querySelector("#panel-".concat(s,"-").concat(k));if(!i.classList.contains("loaded")){var l,u,s=new Image;s.src=u,s.setAttribute("alt",c),e.hasOwnProperty("markDownPrice")&&T&&A&&(l="<span>".concat(e.markDownPrice.price.formattedValue,'</span><br><span class="savings"><del>').concat(e.price.formattedValue,"</del></span>"),u=z({color:"blue",innerHTML:"".concat(e.markDownPrice.savings,"% ").concat(j(w,"off"))}),i.append(u)),a&&A&&(!e.hasOwnProperty("markDownPrice")||t)&&(a=z({color:a.color.toLowerCase(),innerHTML:""+a.displayName}),i.append(a)),n&&_.get(o).from&&(l=j(w,"from").replace("$XX",l));var d=C.get(o)&&C.get(o).url||"".concat(w).concat(d);i.querySelector("a.thumbnail-holder").appendChild(s),i.querySelector("a.thumbnail-holder").setAttribute("href",d),i.querySelector(".body-copy h3")?i.querySelector(".body-copy h3").innerHTML=c:i.querySelector(".body-copy p").innerHTML=c;var p,s=document.querySelector("#input-"+o+"-"+k);if(s&&(s.dataset.name=c),L&&((p=document.createElement("p")).innerHTML=e.summary,p.classList.add("summary"),i.querySelector(".body-copy").appendChild(p)),O.get(o)&&O.get(o).promoliner&&((p=document.createElement("p")).innerHTML=O.get(o).promoliner,p.classList.add("promoliner"),i.querySelector(".body-copy").appendChild(p)),n){var f,m=[],y=_.get(e.code),h=y.parentCategoryName.replace(/[^a-zA-Z0-9]/g,"").toLowerCase(),b=document.createElement("ul");if(b.classList.add("options-"+h),b.classList.add("options"),e.baseOptions&&e.baseOptions[0].options)for(var v=e.baseOptions[0].options,g=0;g<v.length;g++)for(var S=0;S<v[g].categories.length;S++)(function(e,t){var r=new Map;r.set("de-de","de"),r.set("fr-fr","fr"),r.set("hk-zh","cht"),r.set("es-es","es"),r.set("it-it","it"),r.set("jp-jp","jp"),r.set("kr-kr","kr"),r.set("ap-en","ap"),r.set("br-pt","bt"),r.set("tw-zh","cht");var n,o="en",a=_createForOfIteratorHelper(r);try{for(a.s();!(n=a.n()).done;){var c=_slicedToArray(n.value,2),s=c[0],i=c[1];if(-1!==e.indexOf(s)){o=i;break}}}catch(e){a.e(e)}finally{a.f()}r={de:{Farbe:"Color / Design"},fr:{Couleur:"Color / Design"},en:{"Color / Design":"Color / Design"},cht:{"顏色":"Color / Design"},es:{"Color / Diseño":"Color / Design"},it:{"Colore / Design":"Color / Design"}};return r[o]?r[o][t]:null})(w,v[g].categories[S].parentCategoryName)===y.parentCategoryName&&m.push(v[g].categories[S]);for(g=0;g<m.length;g++)b.querySelector("."+m[g].code)||((f=document.createElement("li")).innerHTML="<span></span>",f.classList.add(m[g].code),b.append(f));m.length&&i.querySelector(".body-copy").appendChild(b)}h=i.querySelector(".pure-material-checkbox span");h&&(h.innerText=j(w,"compare")),i.querySelector(".price p").innerHTML=l,i.querySelector(".cta-container a").textContent=j(w,e.stock.stockLevelStatus),i.querySelector(".cta-container a").setAttribute("aria-label","".concat(r.priceType," - ").concat(c,", For ").concat(r.formattedValue)),i.querySelector(".cta-container a").setAttribute("href",d),i.classList.add("loaded")}})};document.querySelector(".store-effect.cards-scroll")&&document.querySelectorAll(".store-effect.cards-scroll").forEach(function(e){var t=e.querySelector(".header"),r=e.querySelector(".store-effect.cards-scroll .spacer");t?(t=t.offsetWidth+t.offsetLeft,r.style.minWidth="calc(min(100vw, 1920px) - "+t+"px)"):(c=1600,window.innerWidth<1441&&(c=1350),r.style.minWidth="calc(min(100vw, 1920px) - "+c+"px)"),l=1578;var n,o,r=e.classList.contains("store-cards-dynamic")||e.classList.contains("products-api"),a=(n=e.querySelector(".store-effect .multi-panels").dataset).backendurl,c=n.skus.split(",").map(function(e){return e.trim()}),s=n.baseurl,i=n.parentid,e=f(s);e&&(a=e),r?(o=[],a=a.replace("**_**",m(s)),a=u(s,a),c.forEach(function(e){var n,t=e.split("|").map(function(e){var t=a+e.trim()+"?fields=FULL"+p(s);return t=0<=a.indexOf("[pid]")?a.replace("[pid]",e.trim()):t});o.push((n=t,new Promise(function(r,e){var t=n.shift();fetch(t).then(function(e){if(400<=e.status&&e.status<500)throw new Error("no data");if(e.headers.get("Content-Type").includes("application/json"))return e.json()}).then(function(e){return r(e)}).catch(function(e){if(!(0<n.length))return r({});var t=n.shift();fetch(t).then(function(e){if(e.headers.get("Content-Type").includes("application/json"))return e.json()}).then(function(e){return r(e)}).catch(function(e){return r({})})})})))}),Promise.all(o).then(function(){Promise.all(o).then(function(e){e=e.filter(function(e){return e});y(e,s,i)})})):(c=c.shift(),fetch(a+c).then(function(e){return e.json()}).then(function(e){e=e.products.filter(function(e){return e});y(e,s,i)}))}),document.addEventListener("keydown",function(e){e=e.keyCode||e.which;o=!1,9==e&&document.querySelectorAll(".focused").forEach(function(e){return e.classList.remove("focused")}),9!=e&&32!=e||(o=!0)}),document.addEventListener("mousedown",function(e){o=!1,document.querySelectorAll(".focused").forEach(function(e){return e.classList.remove("focused")})}),document.querySelectorAll(".cards-scroll .pure-material-checkbox input").forEach(function(e){e.addEventListener("focus",function(e){e.currentTarget.dataset.focusSource="",o&&(e.currentTarget.parentNode.classList.add("focused"),e.currentTarget.dataset.focusSource="key")})}),document.querySelectorAll(".cards-scroll .pure-material-checkbox input").forEach(function(e){e.addEventListener("change",function(e){e.currentTarget.checked?d.set(e.currentTarget.dataset.sku,{name:e.currentTarget.dataset.name}):d.delete(e.currentTarget.dataset.sku,{}),s()})})}]);