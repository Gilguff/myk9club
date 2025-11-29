import { Account, BreadcrumbItem } from "@/types";
import { index } from "@/routes/accounts";
import { Head } from "@inertiajs/react";
import AppLayout from "@/layouts/app-layout";
import AccountsPicker from "@/components/accounts-picker";

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Accounts',
        href: index().url,
    }
]


export default function Accounts({ accounts }: { accounts: Account[] }) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Accounts" />

            <AccountsPicker accounts={accounts} />
        </AppLayout>
    )
}
