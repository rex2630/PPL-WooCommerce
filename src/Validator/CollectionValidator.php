<?php
namespace PPLCZ\Validator;
defined("WPINC") or die();
use PPLCZ\Model\Model\NewCollectionModel;

class CollectionValidator extends ModelValidator
{

    public function canValidate($model)
    {
        return $model instanceof NewCollectionModel;
    }

    public function validate($model, $errors, $path)
    {

        /**
         * @var NewCollectionModel $model
         */
        if (!$model->isInitialized("sendDate") || !$model->getSendDate())
            $errors->add("$path.sendDate", "Datum svozu nesmí být prázdné");
        else {
            $datum = new \DateTime($model->getSendDate());
            $datum = new \DateTime($datum->format("Y-m-d"));
            if ((new \DateTime())->add(new \DateInterval("PT1H")) > $datum)
                $errors->add("$path.sendDate", "Svoz je příliš brzy");
        }

        if ($model->isInitialized("estimatedShipmentCount") && $model->getEstimatedShipmentCount() > 100)
        {
            $errors->add("$path.estimatedShipmentCount", "Příliš mnoho zásilek pro svoz");
        } else if (!$model->isInitialized("estimatedShipmentCount") || $model->getEstimatedShipmentCount() <= 0)
        {
            $errors->add("$path.estimatedShipmentCount", "Příliš málo zásilek pro svoz");
        }

        foreach (["contact" => "Kontakt musí být vyplněn", "telephone" => "Telefon musí být vyplněn", "email" => "Email musí být vyplněn"] as $item => $message)
        {
            if (!$this->getValue($model, $item)) {
                $errors->add("$path.$item", $message);
            }
        }

    }
}