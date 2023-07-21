<?php

return [
    'dashboard' => 'Panel sterowania',
    '404'       => 'Strona nie została znaleziona.',

    'auth'      => [
        'title'           => 'Autoryzacja',
        'username'        => 'Nazwa użytkownika',
        'password'        => 'Hasło',
        'login'           => 'Zaloguj się',
        'logout'          => 'Wyloguj się',
        'wrong-username'  => 'Błędna nazwa użytkownika',
        'wrong-password'  => 'lub hasło',
        'since'           => 'Zarejestrowany od :date',
    ],

    'model' => [
        'create'  => 'Utwórz rekord w sekcji :title',
        'edit'    => 'Aktualizuj rekord w sekcji :title',
    ],

    'links' => [
        'index_page' => 'Do strony',
    ],

    'env_editor' => [
        'title' => 'Edytor ENV',
        'key' => 'Klucz',
        'var' => 'Wartość',
    ],

    'ckeditor' => [
        'upload' => [
            'success' => 'Plik został przesłany: \\n- Rozmiar: :size kb \\n- szerokość/wysokość: :width x :height',

            'error' => [
                'common' => 'Nie można przesłać pliku.',
                'wrong_extension' => 'Plik ":file" ma nieprawidłowe rozszerzenie.',
                'filesize_limit' => 'Maksymalny dozwolony rozmiar pliku to :size kb.',
                'filesize_limit_m' => 'Maksymalny dozwolony rozmiar pliku to :size Mb.',
                'imagesize_max_limit' => 'Szerokość x Wysokość = :width x :height \\n Maksymalna Szerokość x Wysokość musi wynosić: :maxwidth x :maxheight',
                'imagesize_min_limit' => 'Szerokość x Wysokość = :width x :height \\n Minimalna Szerokość x Wysokość musi wynosić: :minwidth x :minheight',
            ],
        ],

        'image_browser' => [
            'title' => 'Wstaw obrazek z serwera',
            'subtitle' => 'Wybierz obrazek do wstawienia',
        ],
    ],

    'table' => [
        'no-action' => 'Brak działania',
        'deleted_all' => 'Usuń wybrane',
        'make-action' => 'Wykonaj',
        'delete-confirm' => 'Czy na pewno chcesz usunąć ten wpis?',
        'action-confirm' => 'Czy na pewno chcesz wykonać to działanie?',
        'delete-error' => 'Błąd podczas usuwania tego wpisu. Najpierw musisz usunąć wszystkie powiązane wpisy.',
        'destroy-confirm' => 'Czy na pewno chcesz na stałe usunąć ten wpis?',
        'destroy-error' => 'Błąd podczas trwałego usuwania tego wpisu. Najpierw musisz usunąć wszystkie powiązane wpisy.',
        'error' => 'Wystąpił błąd podczas Twojego żądania',
        'filter' => 'Pokaż podobne wpisy',
        'filter-goto' => 'Pokaż',
        'save' => 'Zapisz',
        'all' => 'Wszystko',
        'processing' => '<i class="fas fa-spinner fa-5x fa-spin"></i>',
        'loadingRecords' => 'Ładowanie...',
        'lengthMenu' => 'Pokaż _MENU_ wpisów',
        'zeroRecords' => 'Nie znaleziono pasujących rekordów.',
        'info' => 'Pokazuje _START_ do _END_ z _TOTAL_ wpisów',
        'infoEmpty' => 'Brak wpisów',
        'infoFiltered' => '(przefiltrowane z _MAX_ wszystkich wpisów)',
        'infoThousands' => ',',
        'infoPostFix' => '',
        'search' => 'Szukaj ',
        'emptyTable' => 'Brak danych dostępnych w tabeli',

        'paginate' => [
            'first' => 'Pierwszy',
            'previous' => '&larr;',
            'next' => '&rarr;',
            'last' => 'Ostatni',
        ],

        'filters' => [
            'control' => 'Filtr',
        ],
    ],

    'tree' => [
        'expand' => 'Rozwiń wszystko',
        'collapse' => 'Zwiń wszystko',
    ],

    'editable' => [
        'checkbox' => [
            'checked' => 'Tak',
            'unchecked' => 'Nie',
        ],
    ],

    'select' => [
        'nothing' => 'Nic nie wybrano',
        'selected' => 'wybrane',
        'placeholder' => 'Wybierz z listy',
        'no_items'    => 'Brak elementów',
        'init'        => 'Wybierz',
        'empty'       => 'puste',
        'limit'       => 'i jeszcze ${count}',
        'more'       => 'i :count więcej',
        'deselect'    => 'Odznacz',
        'short'       => 'Wprowadź min :min znaków',
    ],

    'image' => [
        'browse' => 'Wybierz obraz',
        'browseMultiple' => 'Wybierz obrazy',
        'remove' => 'Usuń obraz',
        'removeMultiple' => 'Usuń obrazy',
    ],

    'file' => [
        'browse' => 'Wybierz plik',
        'browseMultiple' => 'Wybierz pliki',
        'remove' => 'Usuń plik',
        'insert_link' => 'Wstaw link',
    ],

    'button' => [
        'yes'       => 'Tak',
        'no'        => 'Nie',
        'cancel'    => 'Anuluj',
        'save' => 'Zapisz',
        'new-entry' => 'Dodaj',
        'edit' => 'Edytuj',
        'restore' => 'Przywróć',
        'delete' => 'Usuń',
        'destroy' => 'Zniszcz',
        'save_and_close' => 'Zapisz i zamknij',
        'save_and_create' => 'Zapisz i utwórz',
        'moveUp' => 'Przesuń w górę',
        'moveDown' => 'Przesuń w dół',
        'download' => 'Pobierz',
        'add' => 'Dodaj',
        'remove' => 'Usuń',
        'clear' => 'Wyczyść',
    ],

    'message' => [
        'created' => 'Rekord został pomyślnie utworzony',
        'updated' => 'Rekord został pomyślnie zaktualizowany',
        'deleted' => 'Rekord został pomyślnie usunięty',
        'destroyed' => 'Rekord został pomyślnie zniszczony',
        'restored' => 'Rekord został pomyślnie przywrócony',
        'something_went_wrong' => 'Coś poszło nie tak!',
        'are_you_sure' => 'Czy jesteś pewien?',
        'access_denied' => 'Dostęp zabroniony',
        'validation_error' => 'Błąd walidacji',
    ],

    'related' => [
        'unique' => 'Ta relacja nie jest unikalna',
    ],

    'seo' => [
        'title' => 'Tytuł',
        'description' => 'Opis',
    ],
];