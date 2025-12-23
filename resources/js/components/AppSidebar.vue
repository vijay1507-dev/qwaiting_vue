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
import { index as leadsIndex } from '@/routes/leads';
import { index as clientsIndex } from '@/routes/clients';
import { index as quotesIndex } from '@/routes/quotes';
import { campaigns as marketingCampaigns } from '@/routes/marketing';
import { index as financeIndex } from '@/routes/finance';
import { index as ecommerceIndex } from '@/routes/ecommerce';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/vue3';
import { LayoutGrid, Users, Briefcase, Receipt, Mail, DollarSign, ShoppingBag } from 'lucide-vue-next';
import AppLogo from './AppLogo.vue';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: dashboard(),
        icon: LayoutGrid,
    },
    {
        title: 'Leads',
        href: leadsIndex(),
        icon: Users,
    },
    {
        title: 'Clients',
        href: clientsIndex(),
        icon: Briefcase,
    },
    {
        title: 'Quotes',
        href: quotesIndex(),
        icon: Receipt,
    },
    {
        title: 'Marketing',
        href: marketingCampaigns(),
        icon: Mail,
    },
    {
        title: 'Finance & Analytics',
        href: financeIndex(),
        icon: DollarSign,
    },
    {
        title: 'E-Commerce',
        href: ecommerceIndex(),
        icon: ShoppingBag,
    },
];

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
