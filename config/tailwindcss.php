<?php

return [
    /*
     |---------------------------------------------------------------------
     | Where the TailwindCSS binary can be located.
     |---------------------------------------------------------------------
     |
     | The package is a wrapper around the tailwindcss binary. Each platform needs its own
     | version of the binary file, so the package does not ship with it out-of-the-box.
     | Use the `tailwindcss:download` Artisan command to ensure the binary is there.
     |
     */
    'build_destination_file_path' => public_path('/css/app.css'),

    'build_source_file_path' => resource_path('/css/app.css'),

    /*
     |---------------------------------------------------------------------
     | Where the TailwindCSS binary can be located.
     |---------------------------------------------------------------------
     |
     | The package is a wrapper around the tailwindcss binary. Each platform needs its own
     | version of the binary file, so the package does not ship with it out-of-the-box.
     | Use the `tailwindcss:download` Artisan command to ensure the binary is there.
     |
     */
    'bin_path' => base_path('tailwindcss'),

    /*
     |---------------------------------------------------------------------
     | The version of the binary file.
     |---------------------------------------------------------------------
     |
     | The version we should ensure is installed locally.
     |
     | @see https://github.com/tailwindlabs/tailwindcss/releases to know the version availables.
     |
     */
    'version' => 'v3.0.18',
];
