<?php

namespace App\Helpers;

use App\Models\MailTemplate;

class Common
{
    /**
     * check status
     * @return string
     */
    public static function getAuthGuard($role)
    {
        switch ($role) {
            case ROLE_ADMIN:
                return 'admin';
                break;
            case ROLE_CUSTOMER:
                return 'customer';
                break;
            default:
                return 'user';
        }
    }

    /** get template email by name
     * @param $templateName
     * @param null $data
     * @return array|mixed|null
     */
    public static function getTemplateEmail($templateName, $data = null)
    {
        $data['titleEmail'] = '';
        $data['bodyEmail'] = '';

        $expired_time = '';
        $user_name = '';
        $activation_code = '';
        $company_name = '';
        $service_name = '';
        $service_type_name = '';
        $password = '';
        $email = '';
        $entity_email = '';
        $entity_name = '';
        $service_field = '';

        $mailTemplate = MailTemplate::where('name', $templateName)->where('status', ACTIVE)->first();

        $routeProjectWebHomeIndex = route('project.web.home.index');
        $routeEntityAdmin = route('entity.home');
        if (!empty($mailTemplate)) {
            $data['titleEmail'] = $mailTemplate->title;
            $data['bodyEmail'] = $mailTemplate->body;
        }
        if (!empty($data['expired_time'])) {
            $expired_time = date("Y/m/d H:i:s", strtotime($data['expired_time']));
        }
        if (!empty($data['user_name'])) {
            $user_name = $data['user_name'];
        }
        if (!empty($data['activation_code'])) {
            $activation_code = $data['activation_code'];
        }
        if (!empty($data['company_name'])) {
            $company_name = $data['company_name'];
        }
        if (!empty($data['service_name'])) {
            $service_name = $data['service_name'];
        }
        if (!empty($data['service_type_name'])) {
            $service_type_name = $data['service_type_name'];
        }
        if (!empty($data['password'])) {
            $password = $data['password'];
        }
        if (!empty($data['email'])) {
            $email = $data['email'];
        }
        if (!empty($data['entity_email'])) {
            $entity_email = $data['entity_email'];
        }
        if (!empty($data['entity_name'])) {
            $entity_name = $data['entity_name'];
        }
        if (!empty($data['service_field'])) {
            $service_field = $data['service_field'];
        }

        $data['bodyEmail'] = str_replace('{{ROUTE_PROJECT_WEB_HOME_INDEX}}', $routeProjectWebHomeIndex, $data['bodyEmail']);
        $data['bodyEmail'] = str_replace('{{ROUTE_ENTITY_ADMIN}}', $routeEntityAdmin, $data['bodyEmail']);
        $data['bodyEmail'] = str_replace('{{EXPIRED_TIME}}', $expired_time, $data['bodyEmail']);
        $data['bodyEmail'] = str_replace('{{USER_NAME}}', $user_name, $data['bodyEmail']);
        $data['bodyEmail'] = str_replace('{{CODE}}', $activation_code, $data['bodyEmail']);
        $data['bodyEmail'] = str_replace('{{COMPANY_NAME}}', $company_name, $data['bodyEmail']);
        $data['bodyEmail'] = str_replace('{{SERVICE_NAME}}', $service_name, $data['bodyEmail']);
        $data['bodyEmail'] = str_replace('{{SERVICE_TYPE_NAME}}', $service_type_name, $data['bodyEmail']);
        $data['bodyEmail'] = str_replace('{{PASSWORD}}', $password, $data['bodyEmail']);
        $data['bodyEmail'] = str_replace('{{EMAIL}}', $email, $data['bodyEmail']);
        $data['bodyEmail'] = str_replace('{{ENTITY_EMAIL}}', $entity_email, $data['bodyEmail']);
        $data['bodyEmail'] = str_replace('{{ENTITY_NAME}}', $entity_name, $data['bodyEmail']);
        $data['bodyEmail'] = str_replace('{{SERVICE_FIELD}}', $service_field, $data['bodyEmail']);
        return $data;
    }

    /**
     * Get value input.
     *
     * @param $model
     * @param $column
     * @param $default
     * @return mixed|string
     */
    public static function getValInput($model, $column, $default = null)
    {
        $oldColumn = old($column);
        if (!is_null($oldColumn) && !is_array($oldColumn)) {
            return $oldColumn;
        }

        if (is_object($model)) {
            if (is_null($model->{$column}) && !is_null($default)) {
                return $default;
            }
            return $model->{$column};
        }

        if (!is_null($default)) {
            return $default;
        }

        return '';
    }

    /**
     * Get value select box.
     *
     * @param $model
     * @param $attribute
     * @param $valueCheck
     * @param $default
     * @return string|void
     */
    public static function getValSelect($model, $attribute, $valueCheck, $default = null)
    {
        $oldColumn = old($attribute);

        if (!is_null($oldColumn) && !is_array($oldColumn) && $oldColumn == $valueCheck) {
            return 'selected';
        }

        if (is_object($model) && !is_null($model->{$attribute}) && $model->{$attribute} == $valueCheck) {

            return 'selected';
        }

        if (!is_object($model) && is_null($oldColumn) && !is_null($default) && $default == $valueCheck) {

            return 'selected';
        }
    }

    /**
     * Get value checkbox.
     *
     * @param $model
     * @param $attribute
     * @param $valueCheck
     * @param $default
     * @param $multipleForm
     * @return string
     */
    public static function getValCheckBox($model, $attribute, $valueCheck, $default = null, $multipleForm = null)
    {
        $oldColumn = old($attribute);
        if (!is_null($oldColumn) && !is_array($oldColumn) && $oldColumn == $valueCheck) {
            return 'checked';
        }

        if (is_array($oldColumn) && key_exists($multipleForm, $oldColumn)) {

            if (is_array($oldColumn[$multipleForm])) {
                foreach ($oldColumn[$multipleForm] as $value) {
                    if ($value == $valueCheck) {
                        return 'checked';
                    }
                }
            }
            if ($oldColumn[$multipleForm] == $valueCheck) {
                return 'checked';
            }
        }

        if (is_array($oldColumn)) {

            foreach ($oldColumn as $value) {
                if ($value == $valueCheck) {
                    return 'checked';
                }
            }
        }

        if (is_object($model)) {
            if (!is_null($model->{$attribute}) && $model->{$attribute} == $valueCheck) {
                return 'checked';
            }
        }

        if (!is_null($default) && $default == $valueCheck) {
            return 'checked';
        }

        return '';
    }
}
