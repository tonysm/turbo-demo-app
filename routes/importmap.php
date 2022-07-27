<?php

use Tonysm\ImportmapLaravel\Facades\Importmap;

Importmap::pinAllFrom("resources/js", to: "js/", preload: true);

Importmap::pin("lodash", to: "https://ga.jspm.io/npm:lodash@4.17.21/lodash.js", preload: true);
Importmap::pin("axios", to: "https://ga.jspm.io/npm:axios@0.27.2/index.js", preload: true);
Importmap::pin("#lib/adapters/http.js", to: "https://ga.jspm.io/npm:axios@0.27.2/lib/adapters/xhr.js", preload: true);
Importmap::pin("#lib/defaults/env/FormData.js", to: "https://ga.jspm.io/npm:axios@0.27.2/lib/helpers/null.js", preload: true);
Importmap::pin("buffer", to: "https://ga.jspm.io/npm:@jspm/core@2.0.0-beta.24/nodelibs/browser/buffer.js", preload: true);
Importmap::pin("laravel-echo", to: "https://ga.jspm.io/npm:laravel-echo@1.13.0/dist/echo.js", preload: true);
Importmap::pin("pusher-js", to: "https://ga.jspm.io/npm:pusher-js@7.1.1-beta/dist/web/pusher.js", preload: true);
Importmap::pin("@hotwired/turbo", to: "https://ga.jspm.io/npm:@hotwired/turbo@7.1.0/dist/turbo.es2017-esm.js", preload: true);
Importmap::pin("@hotwired/stimulus", to: "https://ga.jspm.io/npm:@hotwired/stimulus@3.0.1/dist/stimulus.js", preload: true);
Importmap::pin("alpinejs", to: "https://ga.jspm.io/npm:alpinejs@3.10.2/dist/module.esm.js", preload: true);
Importmap::pin("trix", to: "https://ga.jspm.io/npm:trix@2.0.0-beta.0/dist/trix.js", preload: true);
Importmap::pin("el-transition", to: "https://ga.jspm.io/npm:el-transition@0.0.7/index.js", preload: true);
Importmap::pin("tributejs", to: "https://ga.jspm.io/npm:tributejs@5.1.3/dist/tribute.min.js", preload: true);
