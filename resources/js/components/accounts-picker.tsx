import { Account } from "@/types";

export default function AccountsPicker({ accounts }: { accounts: Account[] }) {
    return (
        <>
            {accounts.map((account) => {
                return <h1 key={account.id}> {account.name} </h1>
            })}
        </>
    )
}
