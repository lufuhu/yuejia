<?php

/**
 * A helper file for Dcat Admin, to provide autocomplete information to your IDE
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author jqh <841324345@qq.com>
 */
namespace Dcat\Admin {
    use Illuminate\Support\Collection;

    /**
     * @property Grid\Column|Collection created_at
     * @property Grid\Column|Collection detail
     * @property Grid\Column|Collection id
     * @property Grid\Column|Collection name
     * @property Grid\Column|Collection type
     * @property Grid\Column|Collection updated_at
     * @property Grid\Column|Collection version
     * @property Grid\Column|Collection is_enabled
     * @property Grid\Column|Collection extension
     * @property Grid\Column|Collection icon
     * @property Grid\Column|Collection order
     * @property Grid\Column|Collection parent_id
     * @property Grid\Column|Collection uri
     * @property Grid\Column|Collection menu_id
     * @property Grid\Column|Collection permission_id
     * @property Grid\Column|Collection http_method
     * @property Grid\Column|Collection http_path
     * @property Grid\Column|Collection slug
     * @property Grid\Column|Collection role_id
     * @property Grid\Column|Collection user_id
     * @property Grid\Column|Collection value
     * @property Grid\Column|Collection avatar
     * @property Grid\Column|Collection password
     * @property Grid\Column|Collection remember_token
     * @property Grid\Column|Collection username
     * @property Grid\Column|Collection address
     * @property Grid\Column|Collection address_name
     * @property Grid\Column|Collection address_tel
     * @property Grid\Column|Collection contact_name
     * @property Grid\Column|Collection contact_post
     * @property Grid\Column|Collection contact_tel
     * @property Grid\Column|Collection contact_wx
     * @property Grid\Column|Collection group
     * @property Grid\Column|Collection level
     * @property Grid\Column|Collection platform
     * @property Grid\Column|Collection connection
     * @property Grid\Column|Collection exception
     * @property Grid\Column|Collection failed_at
     * @property Grid\Column|Collection payload
     * @property Grid\Column|Collection queue
     * @property Grid\Column|Collection uuid
     * @property Grid\Column|Collection after_num
     * @property Grid\Column|Collection clientele_id
     * @property Grid\Column|Collection num
     * @property Grid\Column|Collection price
     * @property Grid\Column|Collection product_id
     * @property Grid\Column|Collection status
     * @property Grid\Column|Collection email
     * @property Grid\Column|Collection token
     * @property Grid\Column|Collection abilities
     * @property Grid\Column|Collection last_used_at
     * @property Grid\Column|Collection tokenable_id
     * @property Grid\Column|Collection tokenable_type
     * @property Grid\Column|Collection activity_price
     * @property Grid\Column|Collection carriage
     * @property Grid\Column|Collection consumable
     * @property Grid\Column|Collection img
     * @property Grid\Column|Collection naked_price
     * @property Grid\Column|Collection publicity_price
     * @property Grid\Column|Collection specification
     * @property Grid\Column|Collection supplier
     * @property Grid\Column|Collection admin_id
     * @property Grid\Column|Collection remark
     * @property Grid\Column|Collection identity
     * @property Grid\Column|Collection avatarurl
     * @property Grid\Column|Collection check_user
     * @property Grid\Column|Collection gender
     * @property Grid\Column|Collection keyword
     * @property Grid\Column|Collection last_login_time
     * @property Grid\Column|Collection mail
     * @property Grid\Column|Collection nickname
     * @property Grid\Column|Collection openid
     * @property Grid\Column|Collection phone
     * @property Grid\Column|Collection session_key
     * @property Grid\Column|Collection unionid
     *
     * @method Grid\Column|Collection created_at(string $label = null)
     * @method Grid\Column|Collection detail(string $label = null)
     * @method Grid\Column|Collection id(string $label = null)
     * @method Grid\Column|Collection name(string $label = null)
     * @method Grid\Column|Collection type(string $label = null)
     * @method Grid\Column|Collection updated_at(string $label = null)
     * @method Grid\Column|Collection version(string $label = null)
     * @method Grid\Column|Collection is_enabled(string $label = null)
     * @method Grid\Column|Collection extension(string $label = null)
     * @method Grid\Column|Collection icon(string $label = null)
     * @method Grid\Column|Collection order(string $label = null)
     * @method Grid\Column|Collection parent_id(string $label = null)
     * @method Grid\Column|Collection uri(string $label = null)
     * @method Grid\Column|Collection menu_id(string $label = null)
     * @method Grid\Column|Collection permission_id(string $label = null)
     * @method Grid\Column|Collection http_method(string $label = null)
     * @method Grid\Column|Collection http_path(string $label = null)
     * @method Grid\Column|Collection slug(string $label = null)
     * @method Grid\Column|Collection role_id(string $label = null)
     * @method Grid\Column|Collection user_id(string $label = null)
     * @method Grid\Column|Collection value(string $label = null)
     * @method Grid\Column|Collection avatar(string $label = null)
     * @method Grid\Column|Collection password(string $label = null)
     * @method Grid\Column|Collection remember_token(string $label = null)
     * @method Grid\Column|Collection username(string $label = null)
     * @method Grid\Column|Collection address(string $label = null)
     * @method Grid\Column|Collection address_name(string $label = null)
     * @method Grid\Column|Collection address_tel(string $label = null)
     * @method Grid\Column|Collection contact_name(string $label = null)
     * @method Grid\Column|Collection contact_post(string $label = null)
     * @method Grid\Column|Collection contact_tel(string $label = null)
     * @method Grid\Column|Collection contact_wx(string $label = null)
     * @method Grid\Column|Collection group(string $label = null)
     * @method Grid\Column|Collection level(string $label = null)
     * @method Grid\Column|Collection platform(string $label = null)
     * @method Grid\Column|Collection connection(string $label = null)
     * @method Grid\Column|Collection exception(string $label = null)
     * @method Grid\Column|Collection failed_at(string $label = null)
     * @method Grid\Column|Collection payload(string $label = null)
     * @method Grid\Column|Collection queue(string $label = null)
     * @method Grid\Column|Collection uuid(string $label = null)
     * @method Grid\Column|Collection after_num(string $label = null)
     * @method Grid\Column|Collection clientele_id(string $label = null)
     * @method Grid\Column|Collection num(string $label = null)
     * @method Grid\Column|Collection price(string $label = null)
     * @method Grid\Column|Collection product_id(string $label = null)
     * @method Grid\Column|Collection status(string $label = null)
     * @method Grid\Column|Collection email(string $label = null)
     * @method Grid\Column|Collection token(string $label = null)
     * @method Grid\Column|Collection abilities(string $label = null)
     * @method Grid\Column|Collection last_used_at(string $label = null)
     * @method Grid\Column|Collection tokenable_id(string $label = null)
     * @method Grid\Column|Collection tokenable_type(string $label = null)
     * @method Grid\Column|Collection activity_price(string $label = null)
     * @method Grid\Column|Collection carriage(string $label = null)
     * @method Grid\Column|Collection consumable(string $label = null)
     * @method Grid\Column|Collection img(string $label = null)
     * @method Grid\Column|Collection naked_price(string $label = null)
     * @method Grid\Column|Collection publicity_price(string $label = null)
     * @method Grid\Column|Collection specification(string $label = null)
     * @method Grid\Column|Collection supplier(string $label = null)
     * @method Grid\Column|Collection admin_id(string $label = null)
     * @method Grid\Column|Collection remark(string $label = null)
     * @method Grid\Column|Collection identity(string $label = null)
     * @method Grid\Column|Collection avatarurl(string $label = null)
     * @method Grid\Column|Collection check_user(string $label = null)
     * @method Grid\Column|Collection gender(string $label = null)
     * @method Grid\Column|Collection keyword(string $label = null)
     * @method Grid\Column|Collection last_login_time(string $label = null)
     * @method Grid\Column|Collection mail(string $label = null)
     * @method Grid\Column|Collection nickname(string $label = null)
     * @method Grid\Column|Collection openid(string $label = null)
     * @method Grid\Column|Collection phone(string $label = null)
     * @method Grid\Column|Collection session_key(string $label = null)
     * @method Grid\Column|Collection unionid(string $label = null)
     */
    class Grid {}

    class MiniGrid extends Grid {}

    /**
     * @property Show\Field|Collection created_at
     * @property Show\Field|Collection detail
     * @property Show\Field|Collection id
     * @property Show\Field|Collection name
     * @property Show\Field|Collection type
     * @property Show\Field|Collection updated_at
     * @property Show\Field|Collection version
     * @property Show\Field|Collection is_enabled
     * @property Show\Field|Collection extension
     * @property Show\Field|Collection icon
     * @property Show\Field|Collection order
     * @property Show\Field|Collection parent_id
     * @property Show\Field|Collection uri
     * @property Show\Field|Collection menu_id
     * @property Show\Field|Collection permission_id
     * @property Show\Field|Collection http_method
     * @property Show\Field|Collection http_path
     * @property Show\Field|Collection slug
     * @property Show\Field|Collection role_id
     * @property Show\Field|Collection user_id
     * @property Show\Field|Collection value
     * @property Show\Field|Collection avatar
     * @property Show\Field|Collection password
     * @property Show\Field|Collection remember_token
     * @property Show\Field|Collection username
     * @property Show\Field|Collection address
     * @property Show\Field|Collection address_name
     * @property Show\Field|Collection address_tel
     * @property Show\Field|Collection contact_name
     * @property Show\Field|Collection contact_post
     * @property Show\Field|Collection contact_tel
     * @property Show\Field|Collection contact_wx
     * @property Show\Field|Collection group
     * @property Show\Field|Collection level
     * @property Show\Field|Collection platform
     * @property Show\Field|Collection connection
     * @property Show\Field|Collection exception
     * @property Show\Field|Collection failed_at
     * @property Show\Field|Collection payload
     * @property Show\Field|Collection queue
     * @property Show\Field|Collection uuid
     * @property Show\Field|Collection after_num
     * @property Show\Field|Collection clientele_id
     * @property Show\Field|Collection num
     * @property Show\Field|Collection price
     * @property Show\Field|Collection product_id
     * @property Show\Field|Collection status
     * @property Show\Field|Collection email
     * @property Show\Field|Collection token
     * @property Show\Field|Collection abilities
     * @property Show\Field|Collection last_used_at
     * @property Show\Field|Collection tokenable_id
     * @property Show\Field|Collection tokenable_type
     * @property Show\Field|Collection activity_price
     * @property Show\Field|Collection carriage
     * @property Show\Field|Collection consumable
     * @property Show\Field|Collection img
     * @property Show\Field|Collection naked_price
     * @property Show\Field|Collection publicity_price
     * @property Show\Field|Collection specification
     * @property Show\Field|Collection supplier
     * @property Show\Field|Collection admin_id
     * @property Show\Field|Collection remark
     * @property Show\Field|Collection identity
     * @property Show\Field|Collection avatarurl
     * @property Show\Field|Collection check_user
     * @property Show\Field|Collection gender
     * @property Show\Field|Collection keyword
     * @property Show\Field|Collection last_login_time
     * @property Show\Field|Collection mail
     * @property Show\Field|Collection nickname
     * @property Show\Field|Collection openid
     * @property Show\Field|Collection phone
     * @property Show\Field|Collection session_key
     * @property Show\Field|Collection unionid
     *
     * @method Show\Field|Collection created_at(string $label = null)
     * @method Show\Field|Collection detail(string $label = null)
     * @method Show\Field|Collection id(string $label = null)
     * @method Show\Field|Collection name(string $label = null)
     * @method Show\Field|Collection type(string $label = null)
     * @method Show\Field|Collection updated_at(string $label = null)
     * @method Show\Field|Collection version(string $label = null)
     * @method Show\Field|Collection is_enabled(string $label = null)
     * @method Show\Field|Collection extension(string $label = null)
     * @method Show\Field|Collection icon(string $label = null)
     * @method Show\Field|Collection order(string $label = null)
     * @method Show\Field|Collection parent_id(string $label = null)
     * @method Show\Field|Collection uri(string $label = null)
     * @method Show\Field|Collection menu_id(string $label = null)
     * @method Show\Field|Collection permission_id(string $label = null)
     * @method Show\Field|Collection http_method(string $label = null)
     * @method Show\Field|Collection http_path(string $label = null)
     * @method Show\Field|Collection slug(string $label = null)
     * @method Show\Field|Collection role_id(string $label = null)
     * @method Show\Field|Collection user_id(string $label = null)
     * @method Show\Field|Collection value(string $label = null)
     * @method Show\Field|Collection avatar(string $label = null)
     * @method Show\Field|Collection password(string $label = null)
     * @method Show\Field|Collection remember_token(string $label = null)
     * @method Show\Field|Collection username(string $label = null)
     * @method Show\Field|Collection address(string $label = null)
     * @method Show\Field|Collection address_name(string $label = null)
     * @method Show\Field|Collection address_tel(string $label = null)
     * @method Show\Field|Collection contact_name(string $label = null)
     * @method Show\Field|Collection contact_post(string $label = null)
     * @method Show\Field|Collection contact_tel(string $label = null)
     * @method Show\Field|Collection contact_wx(string $label = null)
     * @method Show\Field|Collection group(string $label = null)
     * @method Show\Field|Collection level(string $label = null)
     * @method Show\Field|Collection platform(string $label = null)
     * @method Show\Field|Collection connection(string $label = null)
     * @method Show\Field|Collection exception(string $label = null)
     * @method Show\Field|Collection failed_at(string $label = null)
     * @method Show\Field|Collection payload(string $label = null)
     * @method Show\Field|Collection queue(string $label = null)
     * @method Show\Field|Collection uuid(string $label = null)
     * @method Show\Field|Collection after_num(string $label = null)
     * @method Show\Field|Collection clientele_id(string $label = null)
     * @method Show\Field|Collection num(string $label = null)
     * @method Show\Field|Collection price(string $label = null)
     * @method Show\Field|Collection product_id(string $label = null)
     * @method Show\Field|Collection status(string $label = null)
     * @method Show\Field|Collection email(string $label = null)
     * @method Show\Field|Collection token(string $label = null)
     * @method Show\Field|Collection abilities(string $label = null)
     * @method Show\Field|Collection last_used_at(string $label = null)
     * @method Show\Field|Collection tokenable_id(string $label = null)
     * @method Show\Field|Collection tokenable_type(string $label = null)
     * @method Show\Field|Collection activity_price(string $label = null)
     * @method Show\Field|Collection carriage(string $label = null)
     * @method Show\Field|Collection consumable(string $label = null)
     * @method Show\Field|Collection img(string $label = null)
     * @method Show\Field|Collection naked_price(string $label = null)
     * @method Show\Field|Collection publicity_price(string $label = null)
     * @method Show\Field|Collection specification(string $label = null)
     * @method Show\Field|Collection supplier(string $label = null)
     * @method Show\Field|Collection admin_id(string $label = null)
     * @method Show\Field|Collection remark(string $label = null)
     * @method Show\Field|Collection identity(string $label = null)
     * @method Show\Field|Collection avatarurl(string $label = null)
     * @method Show\Field|Collection check_user(string $label = null)
     * @method Show\Field|Collection gender(string $label = null)
     * @method Show\Field|Collection keyword(string $label = null)
     * @method Show\Field|Collection last_login_time(string $label = null)
     * @method Show\Field|Collection mail(string $label = null)
     * @method Show\Field|Collection nickname(string $label = null)
     * @method Show\Field|Collection openid(string $label = null)
     * @method Show\Field|Collection phone(string $label = null)
     * @method Show\Field|Collection session_key(string $label = null)
     * @method Show\Field|Collection unionid(string $label = null)
     */
    class Show {}

    /**
     
     */
    class Form {}

}

namespace Dcat\Admin\Grid {
    /**
     
     */
    class Column {}

    /**
     
     */
    class Filter {}
}

namespace Dcat\Admin\Show {
    /**
     
     */
    class Field {}
}
