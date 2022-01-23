<?php

use Tonysm\ImportmapLaravel\Facades\Importmap;

Importmap::pinAllFrom("resources/js", to: "js/", preload: true);

Importmap::pin("lodash", to: "https://ga.jspm.io/npm:lodash@4.17.21/lodash.js", preload: true);
Importmap::pin("axios", to: "https://ga.jspm.io/npm:axios@0.21.4/index.js", preload: true);
Importmap::pin("#lib/adapters/http.js", to: "https://ga.jspm.io/npm:axios@0.21.4/lib/adapters/xhr.js");
Importmap::pin("process", to: "https://ga.jspm.io/npm:@jspm/core@2.0.0-beta.14/nodelibs/browser/process-production.js");
Importmap::pin("laravel-echo", to: "https://ga.jspm.io/npm:laravel-echo@1.11.3/dist/echo.js", preload: true);
Importmap::pin("pusher-js", to: "https://ga.jspm.io/npm:pusher-js@7.0.3/dist/web/pusher.js", preload: true);
Importmap::pin("@hotwired/turbo", to: "https://ga.jspm.io/npm:@hotwired/turbo@7.1.0/dist/turbo.es2017-esm.js", preload: true);
Importmap::pin("@hotwired/stimulus", to: "https://ga.jspm.io/npm:@hotwired/stimulus@3.0.1/dist/stimulus.js", preload: true);
Importmap::pin("alpinejs", to: "https://ga.jspm.io/npm:alpinejs@3.8.1/dist/module.esm.js", preload: true);
Importmap::pin("trix", to: "https://ga.jspm.io/npm:trix@2.0.0-alpha.0/dist/trix.js", preload: true);
Importmap::pin("el-transition", to: "https://ga.jspm.io/npm:el-transition@0.0.7/index.js", preload: true);
Importmap::pin("tributejs", to: "https://ga.jspm.io/npm:tributejs@5.1.3/dist/tribute.min.js", preload: true);
