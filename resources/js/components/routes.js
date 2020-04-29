import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router ({
	routes: [
		/*{
			path: '/',
			name: 'login',
			component: require('./components/Login').default
		},
		{
			path: '/home',
			name: 'home',
			component: require('./components/Menu').default
		},*/
		{
			path: '/blanco',
			name: 'blanco',
			component: require('./BlancoComponent').default,
		},
		{
			path: '/components',
			name: 'components',
			component: require('./ProductoComponent').default,
		},
		{
			path: '/component-show/:id',
			name: 'component-show',
			component: require('./ProductoShowComponent').default,
			props: true,
		},
		{
			path: '/users',
			name: 'users',
			component: require('./UsersComponent').default,
		},
		{
			path: '/users-show/:id',
			name: 'users-show',
			component: require('./UserShowComponent').default,
			props: true,
		},
		{
			path: '/users-edit/:id',
			name: 'users-edit',
			component: require('./UserEditComponent').default,
			props: true,
		},
		{
			path: '/roles',
			name: 'roles',
			component: require('./RolesComponent').default,
		},
		{
			path: '/roles-show/:id',
			name: 'roles-show',
			component: require('./RoleShowComponent').default,
			props: true,
		},
		{
			path: '/roles-edit/:id',
			name: 'roles-edit',
			component: require('./RoleEditComponent').default,
			props: true,
		},
		{
			path: '/roles-create',
			name: 'roles-create',
			component: require('./RoleCreateComponent').default,
		},
		{
			path: '/reporte-adm',
			name: 'reporte-adm',
			component: require('./ReporteAdmComponent').default,
		},
		{
			path: '/reporte-ope',
			name: 'reporte-ope',
			component: require('./ReporteOpeComponent').default,
		},
		{
			path: '/reporte-ges-cal',
			name: 'reporte-ges-cal',
			component: require('./ReporteGesCalComponent').default,
		},
		{
			path: '/reporte-mov',
			name: 'reporte-mov',
			component: require('./ReporteMovComponent').default,
		},
		{
			path: '/liquidar',
			name: 'liquidar',
			component: require('./LiquidarComponent').default,
		},
		{
			path: '/ope-adm-war',
			name: 'ope-adm-war',
			component: require('./OpeAdmWarComponent').default,
		},
		{
			path: '/ope-zon-no-ser',
			name: 'ope-zon-no-ser',
			component: require('./OpeZonNoSerComponent').default,
		},
		{
			path: '/ope-saliendo',
			name: 'ope-saliendo',
			component: require('./OpeSaliendoComponent').default,
		},
		{
			path: '/rep-ope-wer',
			name: 'rep-ope-wer',
			component: require('./RepOpeWerComponent').default,
		},
		{
			path: '/menu-adm-act-adm',
			name: 'menu-adm-act-adm',
			component: require('./MenuAdmActAdmComponent').default,
		},
		{
			path: '/menu-adm-not-pag',
			name: 'menu-adm-not-pag',
			component: require('./MenuAdmNotPagComponent').default,
		},
		{
			path: '/sub-act-adm-fac-guia',
			name: 'sub-act-adm-fac-guia',
			component: require('./SubActAdmFacGuiaComponent').default,
		},
	],
})