import { Account } from "@/types";

export default function AccountsPicker({ accounts }: { accounts: Account[] }) {
    return (
        <>
            {accounts.map((account) => {
                return <h1> {account.name} </h1>
            })}
        </>
    )
}
