<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // users manage users and permissions and roles
            [
                'name' => 'user_management_access',
                'display_name' => 'user access manage users', // optional
                'description' => 'can manage users and roles and permissions', // optional
            ],
            // permissions managments
            [
                'name' => 'permission_access',
                'display_name' => 'access permissions', // optional
                'description' => 'can access pemissions list', // optional
            ],
            [
                'name' => 'permission_create',
                'display_name' => 'create new permission', // optional
                'description' => 'can create new permission', // optional
            ],
            [
                'name' => 'permission_edit',
                'display_name' => 'edit permission', // optional
                'description' => 'can edit permission information', // optional
            ],
            [
                'name' => 'permission_show',
                'display_name' => 'show permission', // optional
                'description' => 'can show permission', // optional
            ],
            [
                'name' => 'permission_delete',
                'display_name' => 'delete permission', // optional
                'description' => 'can delete permission', // optional
            ],
            // roles managments
            [
                'name' => 'role_access',
                'display_name' => 'access roles', // optional
                'description' => 'can access roles list', // optional
            ],
            [
                'name' => 'role_create',
                'display_name' => 'create new role', // optional
                'description' => 'can create new role', // optional
            ],
            [
                'name' => 'role_edit',
                'display_name' => 'edit role', // optional
                'description' => 'can edit role information', // optional
            ],
            [
                'name' => 'role_show',
                'display_name' => 'show role', // optional
                'description' => 'can show role', // optional
            ],
            [
                'name' => 'role_delete',
                'display_name' => 'delete role', // optional
                'description' => 'can delete role', // optional
            ],
            // users managments
            [
                'name' => 'user_access',
                'display_name' => 'access users', // optional
                'description' => 'can access users list', // optional
            ],
            [
                'name' => 'user_create',
                'display_name' => 'create new user', // optional
                'description' => 'can create new user', // optional
            ],
            [
                'name' => 'user_edit',
                'display_name' => 'edit user', // optional
                'description' => 'can edit user information', // optional
            ],
            [
                'name' => 'user_show',
                'display_name' => 'show user', // optional
                'description' => 'can show user', // optional
            ],
            [
                'name' => 'user_delete',
                'display_name' => 'delete user', // optional
                'description' => 'can delete user', // optional
            ],
            // prompts managments
            [
                'name' => 'category_access',
                'display_name' => 'access categories', // optional
                'description' => 'can access categories list', // optional
            ],
            [
                'name' => 'category_create',
                'display_name' => 'create new category', // optional
                'description' => 'can create new category', // optional
            ],
            [
                'name' => 'category_edit',
                'display_name' => 'edit category', // optional
                'description' => 'can edit category information', // optional
            ],
            [
                'name' => 'category_show',
                'display_name' => 'show category', // optional
                'description' => 'can show category', // optional
            ],
            [
                'name' => 'category_delete',
                'display_name' => 'delete category', // optional
                'description' => 'can delete category', // optional
            ],
            // prompts managments
            [
                'name' => 'prompt_access',
                'display_name' => 'access prompts', // optional
                'description' => 'can access prompts list', // optional
            ],
            [
                'name' => 'prompt_create',
                'display_name' => 'create new prompt', // optional
                'description' => 'can create new prompt', // optional
            ],
            [
                'name' => 'prompt_edit',
                'display_name' => 'edit prompt', // optional
                'description' => 'can edit prompt information', // optional
            ],
            [
                'name' => 'prompt_show',
                'display_name' => 'show prompt', // optional
                'description' => 'can show prompt', // optional
            ],
            [
                'name' => 'prompt_delete',
                'display_name' => 'delete prompt', // optional
                'description' => 'can delete prompt', // optional
            ],
            // questions managments
            [
                'name' => 'question_access',
                'display_name' => 'access questions', // optional
                'description' => 'can access questions list', // optional
            ],
            [
                'name' => 'question_create',
                'display_name' => 'create new question', // optional
                'description' => 'can create new question', // optional
            ],
            [
                'name' => 'question_edit',
                'display_name' => 'edit question', // optional
                'description' => 'can edit question information', // optional
            ],
            [
                'name' => 'question_show',
                'display_name' => 'show question', // optional
                'description' => 'can show question', // optional
            ],
            [
                'name' => 'question_delete',
                'display_name' => 'delete question', // optional
                'description' => 'can delete question', // optional
            ],
            // contents managments
            [
                'name' => 'content_access',
                'display_name' => 'access contents', // optional
                'description' => 'can access contents list', // optional
            ],
            [
                'name' => 'content_create',
                'display_name' => 'create new content', // optional
                'description' => 'can create new content', // optional
            ],
            [
                'name' => 'content_edit',
                'display_name' => 'edit content', // optional
                'description' => 'can edit content information', // optional
            ],
            [
                'name' => 'content_show',
                'display_name' => 'show content', // optional
                'description' => 'can show content', // optional
            ],
            [
                'name' => 'content_delete',
                'display_name' => 'delete content', // optional
                'description' => 'can delete content', // optional
            ],
            // tones managments
            [
                'name' => 'tone_access',
                'display_name' => 'access tones', // optional
                'description' => 'can access tones list', // optional
            ],
            [
                'name' => 'tone_create',
                'display_name' => 'create new tone', // optional
                'description' => 'can create new tone', // optional
            ],
            [
                'name' => 'tone_edit',
                'display_name' => 'edit tone', // optional
                'description' => 'can edit tone information', // optional
            ],
            [
                'name' => 'tone_show',
                'display_name' => 'show tone', // optional
                'description' => 'can show tone', // optional
            ],
            [
                'name' => 'tone_delete',
                'display_name' => 'delete tone', // optional
                'description' => 'can delete tone', // optional
            ],
            // answers managments
            [
                'name' => 'answer_access',
                'display_name' => 'access answers', // optional
                'description' => 'can access answers list', // optional
            ],
            [
                'name' => 'answer_create',
                'display_name' => 'create new answer', // optional
                'description' => 'can create new answer', // optional
            ],
            [
                'name' => 'answer_edit',
                'display_name' => 'edit answer', // optional
                'description' => 'can edit answer information', // optional
            ],
            [
                'name' => 'answer_show',
                'display_name' => 'show answer', // optional
                'description' => 'can show answer', // optional
            ],
            [
                'name' => 'answer_delete',
                'display_name' => 'delete answer', // optional
                'description' => 'can delete answer', // optional
            ],
            // audit log managments
            [
                'name' => 'audit_log_access',
                'display_name' => 'access audit logs', // optional
                'description' => 'can access audit logs list', // optional
            ],
            [
                'name' => 'audit_log_create',
                'display_name' => 'create new audit log', // optional
                'description' => 'can create new audit log', // optional
            ],
            [
                'name' => 'audit_log_edit',
                'display_name' => 'edit audit log', // optional
                'description' => 'can edit audit log information', // optional
            ],
            [
                'name' => 'audit_log_show',
                'display_name' => 'show audit log', // optional
                'description' => 'can show audit log', // optional
            ],
            [
                'name' => 'audit_log_delete',
                'display_name' => 'delete audit log', // optional
                'description' => 'can delete audit log', // optional
            ],
            // payments method managments
            [
                'name' => 'payment_method_access',
                'display_name' => 'access payments methods', // optional
                'description' => 'can access payments methods list', // optional
            ],
            [
                'name' => 'payment_method_create',
                'display_name' => 'create new payment method', // optional
                'description' => 'can create new payment method', // optional
            ],
            [
                'name' => 'payment_method_edit',
                'display_name' => 'edit payment method', // optional
                'description' => 'can edit payment method information', // optional
            ],
            [
                'name' => 'payment_method_show',
                'display_name' => 'show payment method', // optional
                'description' => 'can show payment method', // optional
            ],
            [
                'name' => 'payment_method_delete',
                'display_name' => 'delete payment method', // optional
                'description' => 'can delete currency', // optional
            ],
            // 	currency managments
            [
                'name' => 'currency_access',
                'display_name' => 'access currencies', // optional
                'description' => 'can access currencies list', // optional
            ],
            [
                'name' => 'currency_create',
                'display_name' => 'create new currency', // optional
                'description' => 'can create new currency', // optional
            ],
            [
                'name' => 'currency_edit',
                'display_name' => 'edit currency', // optional
                'description' => 'can edit currency information', // optional
            ],
            [
                'name' => 'currency_show',
                'display_name' => 'show currency', // optional
                'description' => 'can show currency', // optional
            ],
            [
                'name' => 'currency_delete',
                'display_name' => 'delete currency', // optional
                'description' => 'can delete currency', // optional
            ],
            // 	plan managments
            [
                'name' => 'plan_access',
                'display_name' => 'access plans', // optional
                'description' => 'can access plans list', // optional
            ],
            [
                'name' => 'plan_create',
                'display_name' => 'create new plan', // optional
                'description' => 'can create new plan', // optional
            ],
            [
                'name' => 'plan_edit',
                'display_name' => 'edit plan', // optional
                'description' => 'can edit plan information', // optional
            ],
            [
                'name' => 'plan_show',
                'display_name' => 'show plan', // optional
                'description' => 'can show plan', // optional
            ],
            [
                'name' => 'plan_delete',
                'display_name' => 'delete plan', // optional
                'description' => 'can delete plan', // optional
            ],
            // 	subscription managments
            [
                'name' => 'subscription_management_access',
                'display_name' => 'access subscriptions management access', // optional
                'description' => 'can access subscriptions management access list', // optional
            ],
            [
                'name' => 'subscription_access',
                'display_name' => 'access subscriptions', // optional
                'description' => 'can access subscriptions list', // optional
            ],
            [
                'name' => 'subscription_create',
                'display_name' => 'create new subscription', // optional
                'description' => 'can create new subscription', // optional
            ],
            [
                'name' => 'subscription_edit',
                'display_name' => 'edit subscription', // optional
                'description' => 'can edit subscription information', // optional
            ],
            [
                'name' => 'subscription_show',
                'display_name' => 'show subscription', // optional
                'description' => 'can show subscription', // optional
            ],
            [
                'name' => 'subscription_delete',
                'display_name' => 'delete subscription', // optional
                'description' => 'can delete subscription', // optional
            ],
            // 	payment managments
            [
                'name' => 'payment_management_access',
                'display_name' => 'access payments management', // optional
                'description' => 'can access payments management list', // optional
            ],
            [
                'name' => 'payment_access',
                'display_name' => 'access payments', // optional
                'description' => 'can access payments list', // optional
            ],
            [
                'name' => 'payment_create',
                'display_name' => 'create new payment', // optional
                'description' => 'can create new payment', // optional
            ],
            [
                'name' => 'payment_edit',
                'display_name' => 'edit payment', // optional
                'description' => 'can edit payment information', // optional
            ],
            [
                'name' => 'payment_show',
                'display_name' => 'show payment', // optional
                'description' => 'can show payment', // optional
            ],
            [
                'name' => 'payment_delete',
                'display_name' => 'delete payment', // optional
                'description' => 'can delete payment', // optional
            ],

        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
