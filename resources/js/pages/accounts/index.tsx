import { BreadcrumbItem, SharedData } from "@/types";
import { index } from "@/routes/accounts";
import { usePage } from "@inertiajs/react";
import AppLayout from "@/layouts/app-layout";

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Accounts',
        href: index().url,
    }
]


export default function Accounts({ accounts }: { accounts: Account }) {
    const { auth } = usePage<SharedData>().props;
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            {accounts}
        </AppLayout>
    )
}
