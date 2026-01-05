<script setup lang="ts">
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import { dashboard } from '@/routes';
import { index as clientsIndex } from '@/routes/clients';
import { index as ecommerceIndex } from '@/routes/ecommerce';
import { sequences as marketingSequences } from '@/routes/marketing';
import { index as subscriptionIndex } from '@/routes/subscription';
import {
    employees as userManagementEmployees,
    roles as userManagementRoles,
} from '@/routes/user-management';
import { type NavItem } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';
import {
    Briefcase,
    CreditCard,
    LayoutGrid,
    Mail,
    ShoppingBag,
    Users2,
} from 'lucide-vue-next';
import { computed } from 'vue';
import AppLogo from './AppLogo.vue';

const page = usePage();
const permissions = computed(() => page.props.auth.permissions);

const hasPermission = (permission: string) => {
    return permissions.value.includes(permission);
};

const allMainNavItems: (NavItem & { permission?: string })[] = [
    {
        title: 'Dashboard',
        href: dashboard(),
        icon: LayoutGrid,
        permission: 'dashboard.read',
    },
    /* {
        title: 'Leads',
        href: leadsIndex(),
        icon: Users,
    }, */
    {
        title: 'Clients',
        href: clientsIndex(),
        icon: Briefcase,
        permission: 'clients.read',
    },
    /*{
        title: 'Quotes',
        href: quotesIndex(),
        icon: Receipt,
    }, */
    {
        title: 'Marketing',
        href: marketingSequences(),
        icon: Mail,
        permission: 'marketing.read',
    },
    /* {
        title: 'Finance & Analytics',
        href: financeIndex(),
        icon: DollarSign,
    }, */
    {
        title: 'E-Commerce',
        href: ecommerceIndex(),
        icon: ShoppingBag,
        permission: 'e-commerce.read',
    },
    {
        title: 'Subscription Management',
        href: subscriptionIndex(),
        icon: CreditCard,
        permission: 'subscription_management.read',
    },
    {
        title: 'User Management',
        icon: Users2,
        permission: 'user_management.read',
        children: [
            {
                title: 'Users',
                href: userManagementEmployees(),
            },
            {
                title: 'Role',
                href: userManagementRoles().url,
            },
        ],
    },
];

const mainNavItems = computed(() => {
    return allMainNavItems.filter((item) => {
        if (item.permission) {
            return hasPermission(item.permission);
        }
        return true;
    });
});

const footerNavItems: NavItem[] = [];
</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="dashboard()">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="mainNavItems" />
        </SidebarContent>

        <SidebarFooter>
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
