<?php

namespace App\Admin\Sections;

use AdminColumn;
use AdminColumnFilter;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Form\Buttons\Cancel;
use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
use SleepingOwl\Admin\Form\Buttons\SaveAndCreate;
use SleepingOwl\Admin\Section;

/**
 * Class Users
 *
 * @property \C:/Users/uczen/AppData/Local/Programs/Git/App/Models/Users $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class Rejestracje extends Section implements Initializable
{
    /**
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $alias;

    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation()->setPriority(100)->setIcon('fa fa-lightbulb-o');
    }

    /**
     * @param array $payload
     *
     * @return DisplayInterface
     */
    public function onDisplay($payload = [])
    {
        $columns = [
            AdminColumn::text('id', '#')->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::link('rej', 'Numer rej', 'created_at'),
            AdminColumn::text('imie', 'Imie'),
            AdminColumn::text('nazwisko', 'Nazwisko'),
            AdminColumn::text('telefon', 'Telefon'),
            AdminColumn::text('dataprzegladu', 'Data Przeglądu'),
        ];

        $display = AdminDisplay::datatablesAsync()
            ->setName('firstdatatables')
            ->setOrder([[0, 'asc']])
            ->setDisplaySearch(true)
            ->paginate(25)
            ->setColumns($columns)
            ->setHtmlAttribute('class', 'table-primary table-hover th-center')
        ;

        // $display->setColumnFilters([
        //     AdminColumnFilter::select()
        //         ->setModelForOptions(\App\Models\User::class, 'name')
        //         ->setLoadOptionsQueryPreparer(function($element, $query) {
        //             return $query;
        //         })
        //         ->setDisplay('name')
        //         ->setColumnName('name')
        //         ->setPlaceholder('All names')
        //     ,
        // ]);
        // $display->getColumnFilters()->setPlacement('card.heading');

        return $display;
    }

    /**
     * @param int|null $id
     * @param array $payload
     *
     * @return FormInterface
     */
    public function onEdit($id = null, $payload = [])
    {
        $form = AdminForm::card()->addBody([
          
                AdminFormElement::select('osoba_id','Właściciel', \App\Models\Osoba::class)->setDisplay('imienazwisko')->required()->setDefaultValue(1),
                AdminFormElement::text('rej', 'Nr rej')->required(),
                AdminFormElement::select('model_id','Model', \App\Models\modele::class)->setDisplay('modelmarka'),
                AdminFormElement::select('rodzpaliwa_id','Paliwo', \App\Models\Rodzpaliwa::class)->setDisplay('rodzaj'),
                AdminFormElement::date('perwszarej', "Data pierwszej rejestracji"),
                AdminFormElement::html("<h2>Dane do ostatniego przeglądu</h2>"),

                AdminFormElement::date('dataprzegladu', "Planowana data przeglądu")->setReadonly(true),
                AdminFormElement::textarea('uwagiprzegladu', "Uwagi ost przeglądu")->setReadonly(true),
                AdminFormElement::html("<h2>Planowanie przeglądu</h2>"),
                AdminFormElement::html(view('admin.datarej')),
                AdminFormElement::textarea('uwagi', "Uwagi"),
            ]);

        $form->getButtons()->setButtons([
            'save'  => new Save(),
            'save_and_close'  => new SaveAndClose(),
            'save_and_create'  => new SaveAndCreate(),
            'cancel'  => (new Cancel()),
        ]);

        return $form;
    }

    /**
     * @return FormInterface
     */
    public function onCreate($payload = [])
    {
        return $this->onEdit(null, $payload);
    }

    /**
     * @return bool
     */
    public function isDeletable(Model $model)
    {
        return true;
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
