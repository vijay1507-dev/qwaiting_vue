<script setup lang="ts">
import {
    SidebarGroup,
    SidebarGroupLabel,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
    SidebarMenuSub,
    SidebarMenuSubItem,
    SidebarMenuSubButton,
} from '@/components/ui/sidebar';
import { Collapsible, CollapsibleContent, CollapsibleTrigger } from '@/components/ui/collapsible';
import { urlIsActive } from '@/lib/utils';
import { type NavItem } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';
import { ChevronUp } from 'lucide-vue-next';

defineProps<{
    items: NavItem[];
}>();

const page = usePage();

const isItemActive = (item: NavItem): boolean => {
    if (item.href) {
        return urlIsActive(item.href, page.url);
    }
    if (item.children) {
        return item.children.some((child) => isItemActive(child));
    }
    return false;
};

const isChildActive = (item: NavItem): boolean => {
    if (item.href) {
        return urlIsActive(item.href, page.url);
    }
    return false;
};
</script>

<template>
    <SidebarGroup class="px-2 py-0">
        <SidebarGroupLabel>Platform</SidebarGroupLabel>
        <SidebarMenu>
            <SidebarMenuItem v-for="item in items" :key="item.title">
                <Collapsible
                    v-if="item.children && item.children.length > 0"
                    :default-open="isItemActive(item)"
                >
                    <template #default="{ open }">
                        <SidebarMenuButton
                            :is-active="isItemActive(item)"
                            :tooltip="item.title"
                            as-child
                        >
                            <CollapsibleTrigger class="w-full">
                                <component :is="item.icon" />
                                <span>{{ item.title }}</span>
                                <ChevronUp
                                    class="ml-auto size-4 transition-transform duration-200"
                                    :class="{ 'rotate-180': open }"
                                />
                            </CollapsibleTrigger>
                        </SidebarMenuButton>
                        <CollapsibleContent>
                            <SidebarMenuSub>
                                <SidebarMenuSubItem
                                    v-for="child in item.children"
                                    :key="child.title"
                                >
                                    <SidebarMenuSubButton
                                        :is-active="isChildActive(child)"
                                        as-child
                                    >
                                        <Link :href="child.href">
                                            <span>{{ child.title }}</span>
                                        </Link>
                                    </SidebarMenuSubButton>
                                </SidebarMenuSubItem>
                            </SidebarMenuSub>
                        </CollapsibleContent>
                    </template>
                </Collapsible>
                <SidebarMenuButton
                    v-else
                    as-child
                    :is-active="item.href ? urlIsActive(item.href, page.url) : false"
                    :tooltip="item.title"
                >
                    <Link :href="item.href">
                        <component :is="item.icon" />
                        <span>{{ item.title }}</span>
                    </Link>
                </SidebarMenuButton>
            </SidebarMenuItem>
        </SidebarMenu>
    </SidebarGroup>
</template>
