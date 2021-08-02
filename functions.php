

<?php

// Option image mise en avant
add_theme_support( 'post-thumbnails' );

// Option menu
add_theme_support('menus') ;

// Option widgets

add_action( 'widgets_init', 'nouvelle_zone_widgets_init' );

function nouvelle_zone_widgets_init() {

    register_sidebar( array(
        'name'          => 'Zone Footer 1',
        'id'            => 'footer_1',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="text-danger">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => 'Zone Footer 2',
        'id'            => 'footer_2',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="text-danger">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => 'Zone Footer 3',
        'id'            => 'footer_3',
        'before_widget' => '<div class="ulspe">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="text-danger">',
        'after_title'   => '</h2>',
    ) );

}



/*
* On utilise une fonction pour créer notre custom post type 'film'
*/
add_action( 'init', 'wpm_custom_post_type_films');
function wpm_custom_post_type_films() {

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x( 'Films', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x( 'Film', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'Films'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'Tous les films'),
		'view_item'           => __( 'Voir les films'),
		'add_new_item'        => __( 'Ajouter un nouveau film'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer le film'),
		'update_item'         => __( 'Modifier le film'),
		'search_items'        => __( 'Rechercher un film'),
		'not_found'           => __( 'Non trouvé'),
		'not_found_in_trash'  => __( 'Non trouvé dans la corbeille'),
	);
	
	// On peut définir ici d'autres options pour notre custom post type
	
	$args = array(
		'label'               => __( 'Films'),
		'description'         => __( 'Tous sur films'),
		'labels'              => $labels,
        'capability_type'     => 'post',
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' ),
		/* 
		* Différentes options supplémentaires
		*/
		'show_in_rest'        => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'films')

	);
	
	// On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
	register_post_type( 'films', $args );

}

add_action( 'init', 'wpm_add_taxonomies', 0 );

//On crée 3 taxonomies personnalisées: Année, Réalisateurs et Catégories de série.

function wpm_add_taxonomies() {
	
	// Taxonomie Année

	// On déclare ici les différentes dénominations de notre taxonomie qui seront affichées et utilisées dans l'administration de WordPress
	$labels_annee = array(
		'name'              			=> _x( 'Années', 'taxonomy general name'),
		'singular_name'     			=> _x( 'Année', 'taxonomy singular name'),
		'search_items'      			=> __( 'Chercher une année'),
		'all_items'        				=> __( 'Toutes les années'),
		'edit_item'         			=> __( 'Editer l année'),
		'update_item'       			=> __( 'Mettre à jour l année'),
		'add_new_item'     				=> __( 'Ajouter une nouvelle année'),
		'new_item_name'     			=> __( 'Valeur de la nouvelle année'),
		'separate_items_with_commas'	=> __( 'Séparer les réalisateurs avec une virgule'),
		'menu_name'         => __( 'Année'),
	);

	$args_annee = array(
	// Si 'hierarchical' est défini à false, notre taxonomie se comportera comme une étiquette standard
		'hierarchical'      => false,
		'labels'            => $labels_annee,
		'show_ui'           => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'annees' ),
	);

	register_taxonomy( 'annees', 'films', $args_annee );

	// Taxonomie Réalisateurs
	
	$labels_realisateurs = array(
		'name'                       => _x( 'Réalisateurs', 'taxonomy general name'),
		'singular_name'              => _x( 'Réalisateur', 'taxonomy singular name'),
		'search_items'               => __( 'Rechercher un réalisateur'),
		'popular_items'              => __( 'Réalisateurs populaires'),
		'all_items'                  => __( 'Tous les réalisateurs'),
		'edit_item'                  => __( 'Editer un réalisateur'),
		'update_item'                => __( 'Mettre à jour un réalisateur'),
		'add_new_item'               => __( 'Ajouter un nouveau réalisateur'),
		'new_item_name'              => __( 'Nom du nouveau réalisateur'),
		'separate_items_with_commas' => __( 'Séparer les réalisateurs avec une virgule'),
		'add_or_remove_items'        => __( 'Ajouter ou supprimer un réalisateur'),
		'choose_from_most_used'      => __( 'Choisir parmi les plus utilisés'),
		'not_found'                  => __( 'Pas de réalisateurs trouvés'),
		'menu_name'                  => __( 'Réalisateurs'),
	);

	$args_realisateurs = array(
		'hierarchical'          => false,
		'labels'                => $labels_realisateurs,
		'show_ui'               => true,
		'show_in_rest'			=> true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'realisateurs' ),
	);

	register_taxonomy( 'realisateurs', 'films', $args_realisateurs );
	
	// Catégorie de films

	$labels_cat_films = array(
		'name'                       => _x( 'Catégories de films', 'taxonomy general name'),
		'singular_name'              => _x( 'Catégories de films', 'taxonomy singular name'),
		'search_items'               => __( 'Rechercher une catégorie'),
		'popular_items'              => __( 'Catégories populaires'),
		'all_items'                  => __( 'Toutes les catégories'),
		'edit_item'                  => __( 'Editer une catégorie'),
		'update_item'                => __( 'Mettre à jour une catégorie'),
		'add_new_item'               => __( 'Ajouter une nouvelle catégorie'),
		'new_item_name'              => __( 'Nom de la nouvelle catégorie'),
		'add_or_remove_items'        => __( 'Ajouter ou supprimer une catégorie'),
		'choose_from_most_used'      => __( 'Choisir parmi les catégories les plus utilisées'),
		'not_found'                  => __( 'Pas de catégories trouvées'),
		'menu_name'                  => __( 'Catégories de films'),
	);

	$args_cat_films = array(
	// Si 'hierarchical' est défini à true, notre taxonomie se comportera comme une catégorie standard
		'hierarchical'          => true,
		'labels'                => $labels_cat_films,
		'show_ui'               => true,
		'show_in_rest'			=> true,
		'show_admin_column'     => true,
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'categories-films' ),
	);

	register_taxonomy( 'categoriesseries', 'films', $args_cat_films );
}




/*
* On utilise une fonction pour créer notre custom post type 'Réalisateur'
*/
add_action( 'init', 'wpm_custom_post_type_realisateurs');
function wpm_custom_post_type_realisateurs() {

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x( 'Réalisateurs', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x( 'Réalisateur', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'Réalisateurs'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'Tous les réalisateurs'),
		'view_item'           => __( 'Voir les réalisateurs'),
		'add_new_item'        => __( 'Ajouter un nouveau réalisateur'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer le réalisateur'),
		'update_item'         => __( 'Modifier le réalisateur'),
		'search_items'        => __( 'Rechercher un réalisateur'),
		'not_found'           => __( 'Non trouvé'),
		'not_found_in_trash'  => __( 'Non trouvé dans la corbeille'),
	);
	
	// On peut définir ici d'autres options pour notre custom post type
	
	$args = array(
		'label'               => __( 'Réalisateurs'),
		'description'         => __( 'Tous sur réalisateur'),
		'labels'              => $labels,
        'capability_type'     => 'post',
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' ),
		/* 
		* Différentes options supplémentaires
		*/
		'show_in_rest'        => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'realisateurs')

	);
	
	// On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
	register_post_type( 'realisateurs', $args );

}

function hwl_home_pagesize( $query ) {
    if ( ! is_admin() && $query->is_main_query() && is_post_type_archive( 'films' ) ) {
        // Display 50 posts for a custom post type called 'films'
        $query->set( 'posts_per_page', 50 );
        return;
    }
}
add_action( 'pre_get_posts', 'hwl_home_pagesize', 1 );



?>