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
 * @property \C:/Program Files/Git/App/Models/Users $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class Osobyy extends Section implements Initializable
{
    /**
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title = "Klienci";

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
            AdminColumn::text('imie', 'Imie'),
            AdminColumn::text('nazwisko', 'Nazwisko'),
            AdminColumn::text('telefon', 'Telefon'),
            AdminColumn::email('email', 'Email'),
            AdminColumn::custom('Aktywność', function ($instance) {
                return $instance->active ? '<i class="fa fa-check"></i>' : '<i class="fa fa-minus"></i>';})
                ->setHtmlAttribute('class', 'text-center'),
        ];

        $display = AdminDisplay::datatables()
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
        $reje = request()->get('p');

        $form = AdminForm::card()->addBody([
            AdminFormElement::text('imie', 'Imie')->required(),
            AdminFormElement::text('nazwisko', 'Nazwisko')->required(),
            AdminFormElement::text('telefon', 'Telefon'),
            AdminFormElement::text('email', 'Email'),
            AdminFormElement::checkbox('active', 'Aktywność'),
          ]);

        if($reje){
            $save = [
                'save_and_close'  => new SaveAndClose(),
                'cancel'  => (new Cancel()),
            ];
        }else{
            $save = [
                'save'  => new Save(),
                'save_and_close'  => new SaveAndClose(),
                'save_and_create'  => new SaveAndCreate(),
                'cancel'  => (new Cancel()),
            ];
        }

        //$form->getButtons()->setBVuttons($save);

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
