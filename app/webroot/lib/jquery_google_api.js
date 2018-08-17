function GoogleApi(options){
    this.defaults = {
        clientId:'583532264699.apps.googleusercontent.com',
        apiKey:'AIzaSyDiNCtys6A8ez3Eoed6-XvErs508aBmogY',
        scopes:'https://www.googleapis.com/auth/analytics.readonly',
        accountId: '~all',
        webPropertyId: '~all'
    };        
    var _options = $.extend({}, this.defaults, options);
    
    //  => eventos
    var apiLoadEvent = function(){
        console.log("oogle api: load event padrao")
    };          
    this.apiLoad = function(event){
        apiLoadEvent = event;
    };        
    //  eventos <=
    
    // ==> analytics 
    this.analytics = function () {};   
    
    this.analytics.getProfiles = function (callback) {                       
        var args = {
            'accountId': '~all',
            'webPropertyId': '~all'
        }
        gapi.client.analytics.management.profiles.list(args).execute(function(resp){
            callback(resp.items);            
        });    
    }
    
    this.analytics.getProfileDominio = function (dominio,callback) {                       
        var args = {
            'accountId':'~all',
            'webPropertyId':'~all'
        }
        var profile = null;
        gapi.client.analytics.management.profiles.list(args).execute(function(resp){
            var profile;
            $.each(resp.items, function(i,e){
                if(e.websiteUrl.search(dominio) != -1){
                    profile = e;
                }  
            });            
            callback(profile);            
        });    
    }
    
    this.analytics.getVisitasData = function (options,callback) {      
        var dataInicial = new XDate().addMonths(-1).toString("yyyy-MM-dd");
        var dataFinal = new XDate().addDays(-1).toString("yyyy-MM-dd");
        var _gaoptions = {
            'ids': 'ga:51980833',
            'start-date':dataInicial,
            'end-date': dataFinal,
            'metrics': 'ga:visits,ga:avgTimeOnSite',
            'dimensions': 'ga:date',
            'sort': null,
            'filters': null,
            'max-results': 30
        }
        _gaoptions = $.extend({}, _gaoptions, options);
         
        gapi.client.analytics.data.ga.get(_gaoptions).execute(function(resp){
            callback(resp);
        });
    }
    
    this.analytics.getVisitasNavegador = function (options,callback) {      
        var dataInicial = new XDate().addMonths(-1).toString("yyyy-MM-dd");
        var dataFinal = new XDate().addDays(-1).toString("yyyy-MM-dd");
        var _gaoptions = {
            'ids': 'ga:51980833',
            'start-date':dataInicial,
            'end-date': dataFinal,
            'metrics': 'ga:visits',
            'dimensions': 'ga:browser',
            'sort':'-ga:visits',
//            'filters': null,
            'max-results': 10
        }
        _gaoptions = $.extend({}, _gaoptions, options);
         
        gapi.client.analytics.data.ga.get(_gaoptions).execute(function(resp){
            callback(resp);
        });
    }
    
    this.analytics.getConteudoGeral = function (options,callback) {      
        var dataInicial = new XDate().addMonths(-1).toString("yyyy-MM-dd");
        var dataFinal = new XDate().addDays(-1).toString("yyyy-MM-dd");
        var _gaoptions = {
            'ids': 'ga:51980833',
            'start-date':dataInicial,
            'end-date': dataFinal,
            'metrics': 'ga:pageviews,ga:uniquePageviews,ga:avgTimeOnPage,ga:entranceBounceRate,ga:exitRate',
            'dimensions': 'ga:pagePath',
            'sort':'-ga:pageviews',
//            'filters': null,
            'max-results': 10
        }
        _gaoptions = $.extend({}, _gaoptions, options);
         
        gapi.client.analytics.data.ga.get(_gaoptions).execute(function(resp){
            callback(resp);
        });
    }
    
    this.analytics.getOrigemVisualizacoes = function (options,callback) {      
        var dataInicial = new XDate().addMonths(-1).toString("yyyy-MM-dd");
        var dataFinal = new XDate().addDays(-1).toString("yyyy-MM-dd");
        var _gaoptions = {
            'ids': 'ga:51980833',
            'start-date':dataInicial,
            'end-date': dataFinal,
            'metrics': 'ga:pageviews,ga:uniquePageviews,ga:avgTimeOnPage,ga:entranceBounceRate,ga:exitRate',
            'dimensions': 'ga:source',
            'sort':'-ga:pageviews',
//            'filters': null,
            'max-results': 10
        }
        _gaoptions = $.extend({}, _gaoptions, options);
         
        gapi.client.analytics.data.ga.get(_gaoptions).execute(function(resp){
            callback(resp);
        });
    }
        
    this.analytics.getContas = function () {           
       
    } 
    
    // analytics <==
    
    // ==> auth util
    //*1
    clientLoaded = function(){  
        gapi.client.setApiKey(_options.apiKey);
        window.setTimeout(checkAuth, 1);
    }      
        
    //*2
    checkAuth =  function() {
        gapi.auth.authorize({
            client_id: _options.clientId, 
            scope: _options.scopes, 
            immediate: true
        }, handleAuthResult);
    }
        
    //*3        
    handleAuthResult = function(authResult) {        
        if (authResult) { // autenticação true , carrega cliente analytics
            gapi.client.load('analytics', 'v3', handleAuthorized);
        } else {
            console.log("google api: nao autorizado.");
            gapi.auth.authorize({
                client_id: _options.clientId, 
                scope: _options.scopes,
                immediate: false
            }, handleAuthResult);
        }
    }        
        
    //*4
    handleAuthorized = function() {
        apiLoadEvent();
        console.log("google api: carregou cliente gapi ");
        console.log("google api: autorizado.");
    }
        
    handleAuthClick = function(event) {
        gapi.auth.authorize({
            client_id: clientId, 
            scope: scopes, 
            immediate: false
        }, handleAuthResult);
        return false;
    }
    // auth util <==
    
    $.ajax({    
        url: "https://apis.google.com/js/client.js?onload=clientLoaded",
        dataType: "script",
        async  : false,
        success: function(){
            console.log('google api: cliente.js importado');
        }
    });
    $.ajax({    
        url: "/lib/xdate.js",
        dataType: "script",
        async  : false       
    });
        
    return this;
}
