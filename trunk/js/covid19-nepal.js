function translateNepali(e){e=e.toString().replace(/\B(?=(\d{3})+(?!\d))/g,",");for(var t=new Array("0","1","2","3","4","5","6","7","8","9"),a=new Array("०","१","२","३","४","५","६","७","८","९"),n=0;n<t.length;n++)e=e.replace(new RegExp(t[n],"g"),a[n]);return e}jQuery(document).ready(function(e){e.when(e.ajax("https://corona.lmao.ninja/v2/all"),e.ajax("https://corona.lmao.ninja/v2/countries/Nepal")).then(function(t,a){console.log(t),console.log(a),e(".covid-container #world-total-cases").text(translateNepali(t[0].cases)),e(".covid-container #world-total-deaths").text(translateNepali(t[0].deaths)),e(".covid-container #world-total-recovered").text(translateNepali(t[0].recovered)),e(".covid-container #nepal-total-tests").text(translateNepali(a[0].tests)),e(".covid-container #nepal-total-cases").text(translateNepali(a[0].cases)),e(".covid-container #nepal-total-deaths").text(translateNepali(a[0].deaths)),e(".covid-container #nepal-total-recovered").text(translateNepali(a[0].recovered)),e(".covid-container #total-countries").text(translateNepali(t[0].affectedCountries))}).fail(function(e){console.log(e)})});