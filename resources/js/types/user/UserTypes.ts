export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at: string;
    is_owner: boolean;
    role_id: number;
}

export type UserEditable = Omit<User, "email_verified_at" | "is_owner"> & {
    edit_url: string;
    role_name: string;
};
