<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'addresses' => [
        'name' => 'Addresses',
        'index_title' => 'Addresses List',
        'new_title' => 'New Address',
        'create_title' => 'Create Address',
        'edit_title' => 'Edit Address',
        'show_title' => 'Show Address',
        'inputs' => [
            'user_id' => 'User Id',
            'country' => 'Country',
            'state' => 'State',
            'city' => 'City',
            'zip_code' => 'Zip Code',
            'address_line_1' => 'Address Line 1',
            'address_line_2' => 'Address Line 2',
            'phone' => 'Phone',
            'phone_2' => 'Phone 2',
        ],
    ],

    'banners' => [
        'name' => 'Banners',
        'index_title' => 'Banners List',
        'new_title' => 'New Banner',
        'create_title' => 'Create Banner',
        'edit_title' => 'Edit Banner',
        'show_title' => 'Show Banner',
        'inputs' => [
            'image' => 'Image',
            'name' => 'Name',
            'position' => 'Position',
        ],
    ],

    'carousels' => [
        'name' => 'Carousels',
        'index_title' => 'Carousels List',
        'new_title' => 'New Carousel',
        'create_title' => 'Create Carousel',
        'edit_title' => 'Edit Carousel',
        'show_title' => 'Show Carousel',
        'inputs' => [
            'image' => 'Image',
            'name' => 'Name',
            'overlay_text' => 'Overlay Text',
        ],
    ],

    'carts' => [
        'name' => 'Carts',
        'index_title' => 'Carts List',
        'new_title' => 'New Cart',
        'create_title' => 'Create Cart',
        'edit_title' => 'Edit Cart',
        'show_title' => 'Show Cart',
        'inputs' => [
            'user_id' => 'User',
            'product_id' => 'Product Id',
            'quantity' => 'Quantity',
        ],
    ],

    'categories' => [
        'name' => 'Categories',
        'index_title' => 'Categories List',
        'new_title' => 'New Category',
        'create_title' => 'Create Category',
        'edit_title' => 'Edit Category',
        'show_title' => 'Show Category',
        'inputs' => [
            'name' => 'Name',
            'parent_id' => 'Category',
        ],
    ],

    'contents' => [
        'name' => 'Contents',
        'index_title' => 'Contents List',
        'new_title' => 'New Content',
        'create_title' => 'Create Content',
        'edit_title' => 'Edit Content',
        'show_title' => 'Show Content',
        'inputs' => [
            'page' => 'Page',
            'name' => 'Name',
            'content_type' => 'Content Type',
            'key' => 'Key',
            'value' => 'Value',
        ],
    ],

    'invoices' => [
        'name' => 'Invoices',
        'index_title' => 'Invoices List',
        'new_title' => 'New Invoice',
        'create_title' => 'Create Invoice',
        'edit_title' => 'Edit Invoice',
        'show_title' => 'Show Invoice',
        'inputs' => [
            'user_id' => 'User Id',
            'invoice_ref' => 'Invoice Ref',
            'line_items' => 'Line Items',
            'status' => 'Status',
            'user_name' => 'User Name',
            'phone' => 'Phone',
            'total' => 'Total',
        ],
    ],

    'orders' => [
        'name' => 'Orders',
        'index_title' => 'Orders List',
        'new_title' => 'New Order',
        'create_title' => 'Create Order',
        'edit_title' => 'Edit Order',
        'show_title' => 'Show Order',
        'inputs' => [
            'user_id' => 'User',
            'name' => 'Name',
            'payment_ref' => 'Payment Ref',
            'state' => 'State',
            'country' => 'Country',
            'discount' => 'Discount',
            'payments_status' => 'Payments Status',
            'payment_response' => 'Payment Response',
            'shipping_total' => 'Shipping Total',
        ],
    ],

    'order_items' => [
        'name' => 'Order Items',
        'index_title' => 'OrderItems List',
        'new_title' => 'New Order item',
        'create_title' => 'Create OrderItem',
        'edit_title' => 'Edit OrderItem',
        'show_title' => 'Show OrderItem',
        'inputs' => [
            'order_id' => 'Order Id',
            'product_id' => 'Product Id',
            'quantity' => 'Quantity',
            'price' => 'Price',
        ],
    ],

    'products' => [
        'name' => 'Products',
        'index_title' => 'Products List',
        'new_title' => 'New Product',
        'create_title' => 'Create Product',
        'edit_title' => 'Edit Product',
        'show_title' => 'Show Product',
        'inputs' => [
            'name' => 'Name',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'description' => 'Description',
            'type' => 'Type',
            'short_description' => 'Short Description',
            'shipping_fee' => 'Shipping Fee',
            'sale_price' => 'Sale Price',
            'sale_start' => 'Sale Start',
            'sale_end' => 'Sale End',
            'slug' => 'Slug',
        ],
    ],

    'product_categories' => [
        'name' => 'Product Categories',
        'index_title' => 'ProductCategories List',
        'new_title' => 'New Product category',
        'create_title' => 'Create ProductCategory',
        'edit_title' => 'Edit ProductCategory',
        'show_title' => 'Show ProductCategory',
        'inputs' => [
            'product_id' => 'Product Id',
            'category_id' => 'Category Id',
        ],
    ],

    'reviews' => [
        'name' => 'Reviews',
        'index_title' => 'Reviews List',
        'new_title' => 'New Review',
        'create_title' => 'Create Review',
        'edit_title' => 'Edit Review',
        'show_title' => 'Show Review',
        'inputs' => [
            'user_id' => 'User Id',
            'product_id' => 'Product Id',
            'rating' => 'Rating',
            'title' => 'Title',
            'message' => 'Message',
            'visibility' => 'Visibility',
        ],
    ],

    'store_settings' => [
        'name' => 'Store Settings',
        'index_title' => 'StoreSettings List',
        'new_title' => 'New Store setting',
        'create_title' => 'Create StoreSetting',
        'edit_title' => 'Edit StoreSetting',
        'show_title' => 'Show StoreSetting',
        'inputs' => [
            'key' => 'Key',
            'value' => 'Value',
        ],
    ],

    'ui_settings' => [
        'name' => 'Ui Settings',
        'index_title' => 'UiSettings List',
        'new_title' => 'New Ui setting',
        'create_title' => 'Create UiSetting',
        'edit_title' => 'Edit UiSetting',
        'show_title' => 'Show UiSetting',
        'inputs' => [
            'key' => 'Key',
            'value' => 'Value',
            'page' => 'Page',
            'name' => 'Name',
        ],
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ],
    ],

    'blog_categories' => [
        'name' => 'Blog Categories',
        'index_title' => 'BlogCategories List',
        'new_title' => 'New Blog category',
        'create_title' => 'Create BlogCategory',
        'edit_title' => 'Edit BlogCategory',
        'show_title' => 'Show BlogCategory',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'blog_posts' => [
        'name' => 'Blog Posts',
        'index_title' => 'BlogPosts List',
        'new_title' => 'New Blog post',
        'create_title' => 'Create BlogPost',
        'edit_title' => 'Edit BlogPost',
        'show_title' => 'Show BlogPost',
        'inputs' => [
            'title' => 'Title',
            'author' => 'User',
            'description' => 'Description',
            'content' => 'Content',
            'featured_image' => 'Featured Image',
            'is_featured' => 'Is Featured',
            'meta' => 'Meta',
            'blog_category_id' => 'Blog Category',
        ],
    ],

    'blog_post_tags' => [
        'name' => 'Blog Post Tags',
        'index_title' => 'BlogPostTags List',
        'new_title' => 'New Blog post tag',
        'create_title' => 'Create BlogPostTag',
        'edit_title' => 'Edit BlogPostTag',
        'show_title' => 'Show BlogPostTag',
        'inputs' => [
            'blog_post_id' => 'Blog Post Id',
            'blog_tag_id' => 'Blog Tag Id',
        ],
    ],

    'blog_tags' => [
        'name' => 'Blog Tags',
        'index_title' => 'BlogTags List',
        'new_title' => 'New Blog tag',
        'create_title' => 'Create BlogTag',
        'edit_title' => 'Edit BlogTag',
        'show_title' => 'Show BlogTag',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'contacts' => [
        'name' => 'Contacts',
        'index_title' => 'Contacts List',
        'new_title' => 'New Contact',
        'create_title' => 'Create Contact',
        'edit_title' => 'Edit Contact',
        'show_title' => 'Show Contact',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'message' => 'Message',
        ],
    ],

    'network_teams' => [
        'name' => 'Network Teams',
        'index_title' => 'NetworkTeams List',
        'new_title' => 'New Network team',
        'create_title' => 'Create NetworkTeam',
        'edit_title' => 'Edit NetworkTeam',
        'show_title' => 'Show NetworkTeam',
        'inputs' => [
            'user_id' => 'User Id',
            'parent' => 'Parent',
        ],
    ],

    'product_images' => [
        'name' => 'Product Images',
        'index_title' => 'ProductImages List',
        'new_title' => 'New Product image',
        'create_title' => 'Create ProductImage',
        'edit_title' => 'Edit ProductImage',
        'show_title' => 'Show ProductImage',
        'inputs' => [
            'product_id' => 'Product',
            'image' => 'Image',
            'status' => 'Status',
        ],
    ],

    'quotes' => [
        'name' => 'Quotes',
        'index_title' => 'Quotes List',
        'new_title' => 'New Quote',
        'create_title' => 'Create Quote',
        'edit_title' => 'Edit Quote',
        'show_title' => 'Show Quote',
        'inputs' => [
            'product_id' => 'Product',
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'Address',
            'specification' => 'Specification',
            'status' => 'Status',
        ],
    ],

    'transactions' => [
        'name' => 'Transactions',
        'index_title' => 'Transactions List',
        'new_title' => 'New Transaction',
        'create_title' => 'Create Transaction',
        'edit_title' => 'Edit Transaction',
        'show_title' => 'Show Transaction',
        'inputs' => [
            'id' => 'Order',
            'ref' => 'Ref',
            'amount' => 'Amount',
            'type' => 'Type',
            'status' => 'Status',
        ],
    ],

    'user_store_credits' => [
        'name' => 'User Store Credits',
        'index_title' => 'UserStoreCredits List',
        'new_title' => 'New User store credit',
        'create_title' => 'Create UserStoreCredit',
        'edit_title' => 'Edit UserStoreCredit',
        'show_title' => 'Show UserStoreCredit',
        'inputs' => [
            'user_id' => 'User',
            'credit' => 'Credit',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];
